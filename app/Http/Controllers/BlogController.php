<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; // Ensure this is present
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function addBlog()
    {
        $categories = Category::all();
        return view('Admin.SuperAdmin.Blogs.addBlog', compact('categories'));
    }

    public function storeBlog(Request $request)
    {
        // Validate incoming request
        $validatedData  = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Generate a slug from the title
        $slug = Str::slug($request->title);



        // Create the blog post with the new fields
        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $request->img,
            'category_id' => $request->category_id,
            'slug' => $slug,
            'status' => $request->status ?? 0,
        ]);

        // Redirect to the show-blog route
        return redirect()->route('show.blog')->with('success', 'Blog created successfully.');
    }

    // public function showBlog()
    // {
    //     return view('Blog.DisplayBlog');
    // }

    public function showBlog()
    {
        // Fetch blog posts for display
        $blogs = Blog::all(); // Adjust the query based on your requirements

        return view('Admin.SuperAdmin.Blogs.showBlog', compact('blogs'));
    }


    // BlogController.php
    public function displayBlog()
    {
        $blogs = Blog::all(); // Fetch all blog posts

        return view('UI.Blog.DisplayBlog', compact('blogs'));
    }

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect('/show-blog')->with('success', 'Blog deleted successfully');
    }

    // BlogController.php

    public function edit($slug)
    {
        $blog = Blog::findOrFail($slug);
        $categories = Category::all();

        return view('Admin.SuperAdmin.Blogs.editBlog', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $request->img,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('blog.list')->with('success', 'Blog updated successfully.');
    }
}
