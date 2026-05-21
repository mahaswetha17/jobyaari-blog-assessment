<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // Display all blogs in the admin panel
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    // Show form to create a new blog
    public function create()
    {
        return view('admin.blogs.create');
    }

    // Store a newly created blog
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'short_description' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'published_date' => 'required|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Stores inside storage/app/public/blogs
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
    }

    // Show form to edit an existing blog
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    // Update the blog
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'short_description' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'published_date' => 'required|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
    }

    // Delete the blog
    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully!');
    }
}