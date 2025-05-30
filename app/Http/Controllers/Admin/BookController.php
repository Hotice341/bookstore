<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $books = Book::with('category')->latest()->get();
        return view('admin.books.index', ['title' => 'Book Lists'], ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('admin.books.create', ['title' => 'Add New Book', 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'authors' => 'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:books,isbn',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'publication_year' => 'nullable|integer|digits:4',
            'publisher' => 'nullable|string|max:255',
            'edition' => 'nullable|string|max:255',
            'pages' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Book Title is required.',
            'category_id.required' => 'Category is required.',
            'authors.required' => 'Authors is required.',
            'isbn.required' => 'ISBN is required.',
            'quantity.required' => 'Quantity is required.',
            'price.required' => 'Price is required.',
        ]);

        try {

            $bookData = $validated;
            $bookData['authors'] = $this->cleanAuthorsString($validated['authors']);

            // Handle cover_image image upload
            if ($request->hasFile('cover_image')) {
                $file = $request->file('cover_image');
                $filename = time() . '.' . $file->getClientOriginalExtension();

                if (!file_exists(public_path('uploads/books-cover'))) {
                    mkdir(public_path('uploads/books-cover'), 0777, true);
                }

                // Save a new image
                $file->move(public_path('uploads/books-cover'), $filename);
                $bookData['cover_image'] = $filename;
            }

            Book::create($bookData);
            return redirect()->route('books.index')->with('success', 'Book created successfully.');
        }catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $book = Book::with('category')->findOrFail($id);
        $categories = Category::all();
        return view('admin.books.edit', ['title' => 'Edit Book', 'book' => $book, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $book = Book::with('category')->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'authors' => 'required|string|max:255',
            'isbn' => [
                'required',
                'string',
                'max:20',
                Rule::unique('books', 'isbn')->ignore($book->id),
            ],
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'publication_year' => 'nullable|integer|digits:4',
            'publisher' => 'nullable|string|max:255',
            'edition' => 'nullable|string|max:255',
            'pages' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Book Title is required.',
            'category_id.required' => 'Category is required.',
            'authors.required' => 'Authors is required.',
            'isbn.required' => 'ISBN is required.',
            'quantity.required' => 'Quantity is required.',
            'price.required' => 'Price is required.',
        ]);

        try {

            $bookData = $validated;
            $bookData['authors'] = $this->cleanAuthorsString($validated['authors'] ?? '');

            // Handle cover_image image upload
            if ($request->hasFile('cover_image')) {
                $file = $request->file('cover_image');
                $filename = time() . '.' . $file->getClientOriginalExtension();

                if ($book && $book->cover_image && file_exists
                    (public_path('profile/' . $book->cover_image))) {
                    unlink(public_path('uploads/books-cover/'. $book->cover_image));
                }

                // Save a new image
                $file->move(public_path('uploads/books-cover'), $filename);
                $bookData['cover_image'] = $filename;
            }

            $book->update($bookData);
            return redirect()->back()->with('success', "Book: $book->title has been updated successfully.");
        }catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $book = Book::with('category')->findOrFail($id);
        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Book moved to trash successfully.'
        ]);
    }

    /**
     * @return View
     */
    public function trashed(): View
    {
        $books = Book::onlyTrashed()->get();
        return view('admin.books.trashed', ['title' => 'Books Trashed', 'books' => $books]);
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id): RedirectResponse
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->restore();
        return redirect()->route('books.index')->with('success', 'Book restored successfully.');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function forceDelete(string $id): RedirectResponse
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->forceDelete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    /**
     * Clean and format authors string
     */
    public function cleanAuthorsString(string $authors): string
    {

        $authors = preg_replace('/\s*,\s*/', ',', $authors);
        $authors = trim($authors, ', ');

        $authorsArray = explode(',', $authors);
        $authorsArray = array_map(function ($author) {
            return trim(ucwords(strtolower($author)));
        }, $authorsArray);

        return implode(', ', $authorsArray);
    }
}
