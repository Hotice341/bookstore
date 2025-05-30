<?php

namespace App\Http\Controllers;

use App\Models\BookOrder;
use App\Models\Transactions;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        $transactions = Transactions::with('book', 'user.profile')
            ->when(request('status'), function($query, $status) {
                return $query->where('status', $status);
            })
            ->latest()
            ->get();
        return view('admin.transactions.index', [
            'transactions' => $transactions,
            'title' => 'Transactions'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function bookOrders(): Renderable
    {
        $bookOrders = BookOrder::with('book', 'user.profile')
            ->when(request('status'), function($query, $status) {
                return $query->where('status', $status);
            })
            ->latest()
            ->get();

        return view('admin.transactions.bookOrders', [
            'bookOrders' => $bookOrders,
            'title' => 'Book Orders'
        ]);
    }

    /**
     * Approve a book order
     * @param string $id
     * @return JsonResponse
     */
    public function approveBookOrder(string $id): JsonResponse
    {
        $bookOrder = BookOrder::where('id', $id)->firstOrFail();
        try {
            $bookOrder->update([
                'status' => 'approved'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Book order approved successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to approve book order: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Decline a book order
     * @param string $id
     * @return JsonResponse
     */
    public function declineBookOrder(string $id): JsonResponse
    {
        $bookOrder = BookOrder::where('id', $id)->firstOrFail();
        try {
            $bookOrder->update([
                'status' => 'declined'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Book order declined successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to decline book order: ' . $e->getMessage()
            ], 500);
        }
    }
}
