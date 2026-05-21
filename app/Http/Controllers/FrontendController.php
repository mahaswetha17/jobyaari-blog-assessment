<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Render public homepage with all blogs
    public function index()
    {
        $blogs = Blog::orderBy('published_date', 'desc')->get();
        return view('welcome', compact('blogs'));
    }

    // Render single blog detail page
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog-detail', compact('blog'));
    }

    // Handle AJAX dynamic filtering & real-time search
    public function filterBlogs(Request $request)
    {
        $query = Blog::query();

        // Filter by Category
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        // Filter by Specific Date
        if ($request->has('date') && $request->date != '') {
            $query->whereDate('published_date', $request->date);
        }

        // Real-time Search by Title or Content
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $blogs = $query->orderBy('published_date', 'desc')->get();

        // Return a raw partial HTML snippet back to jQuery
        return view('partials.blog_list_cards', compact('blogs'))->render();
    }
}