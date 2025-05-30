<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function blogs(): View
    {
        $blogs = Blog::with('category', 'user')->latest()->paginate(6);

        return view('blog.blog', [
            'blogs' => $blogs
        ]);
    }

    public function blogDetails($id): View
    {
        $blog = Blog::find($id);

        return view('blog.blog-details', [
            'blog' => $blog
        ]);
    }
}
