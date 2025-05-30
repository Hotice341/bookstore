<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('welcome');
    }

    /**
     * @return View
     */
    public function books(): View
    {
        $books = Book::with('category')->latest()->paginate(4);
        return view('books.index', compact('books'));
    }

    /**
     * @param $bookId
     * @return Renderable
     */
    public function bookDetails($bookId): Renderable
    {
        $user = Auth::user();
        $profilePictureUrl = optional($user)->profile ?
            asset('profile/' . $user->profile->profile_picture) :
            'https://placehold.co/124x124/000000/FFF?text=' . substr(optional($user)->name ?? 'U', 0, 1);

        $book = Book::with('category')->findOrFail($bookId);
        $relatedBooks = Book::where('category_id', $book->category_id)->where('id', '!=', $bookId)->limit(3)->get();

        // If not found
        if ($relatedBooks->isEmpty()) {
            $relatedBooks = Book::where('id', '!=', $bookId)->InRandomOrder()->limit(3)->get();
        }
        return view('books.details', compact('book', 'profilePictureUrl', 'relatedBooks'));
    }

    /**
     * @param $slug
     * @return Renderable
     */
    public function categoryDetails($slug): Renderable
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $books = $category->books()->paginate(6);
        return view('books.category', compact('category', 'books'));
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::guard('web')->logout();
        return redirect('/')->with('success', 'You have been logged out.');
    }
}
