<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookOrder;
use App\Models\BookTransaction;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @param Request $request
     * @return RedirectResponse
     */
    public function redirectToGateway(Request $request): RedirectResponse
    {
        try{

            $request->validate([
                'book_id' => 'required|exists:books,id',
                'quantity' => 'required|integer|min:1',
            ]);

            $user = Auth::user();
            if (!$user) {
                session(['url.intended' => url()->previous()]);
                return redirect()->route('login')->with('error', 'Please login to proceed');
            }

            $book = Book::findOrFail($request->input('book_id'));
            $quantity = max((int)$request->input('quantity'), 1);
            $totalAmount = $book->price * $quantity;

            $data = [
                'reference' => uniqid("Ref_"),
                'email' => $user->email,
                'name' => $user->name,
                'amount' => $totalAmount * 100,
                'currency' => 'NGN',
                'metadata' => json_encode([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'quantity' => $quantity,
                ])
            ];

            $transaction = BookTransaction::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'amount' => $totalAmount,
                'quantity' => $quantity,
                'transaction_ref' => $data['reference'],
                'status' => 'pending',
            ]);

            session(['transaction_id' => $transaction->id]);

            return Paystack::getAuthorizationUrl($data)->redirectNow();
        }catch(Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return RedirectResponse
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        if (!session()->has('transaction_id')) {
            return redirect()->back()->with('error', 'Transaction id not found');
        }

        $transactionId = session('transaction_id');
        $transaction = BookTransaction::find($transactionId);

        if (!$transaction) {
            return redirect()->back()->with('error', 'Transaction not found');
        }

        if ($paymentDetails['status'] !== true || $paymentDetails['data']['status'] !== 'success') {
            $transaction->update([
                'status' => 'failed',
                'payment_details' => json_encode($paymentDetails)
            ]);

            session()->forget('transaction_id');
            return redirect()->back()->with('error', 'Transaction failed');
        }

        $transaction->update([
            'status' => 'success',
            'transaction_id' => $paymentDetails['data']['id'],
            'payment_details' => json_encode($paymentDetails),
            'time_of_transaction' => now()
        ]);

        $metadata = $paymentDetails['data']['metadata'] ?? [];

        if (isset($metadata['book_id'], $metadata['quantity'])) {
            $user = Auth::user();
            $book = Book::findOrFail($metadata['book_id']);

            BookOrder::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'quantity' => $metadata['quantity'],
                'amount' => $book->price * $metadata['quantity'],
                'status' => 'pending',
            ]);

            session()->forget(['transaction_id', 'book_id']);

            return redirect('/')->with('success', 'Payment successful, Your book order has been placed.');
        }
    }
}
