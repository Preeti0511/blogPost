<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
        return view('allposts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::get();
        return view('addpost', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:posts,title',
            'content' => 'required',
            'image' => 'required|image',

            'category_id' => 'required|exists:categories,id',

        ]);

        $imagepath = $request->file('image')->store('posts', 'public');
        Post::create([
            'title'       => $request->title,
            'content'     => $request->content,
            'image'       => $imagepath,
            'user_id'     => Auth::id(),
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('post.show', Auth::id());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::where('user_id', Auth::id())->get();
        return view('viewsingleuserposts', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('update_post', $post);

        $categories = Category::get();
        return view('editpost', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        Gate::authorize('update_post', $post);


        $post = Post::findOrFail($id);
        $request->validate([
            'title' => 'required|unique:posts,title,' . $post->id,
            'content' => 'required',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',

        ]);
        $data = [
            'title'       => $request->title,
            'content'     => $request->content,
            'user_id'     => Auth::id(),
            'category_id' => $request->category_id,
        ];
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            // Store new image
            $imagepath = $request->file('image')->store('posts', 'public');

            $data['image'] = $imagepath;
        }
        $post->update($data);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        $posts = Post::get();
        if (Auth::user()->role === 'admin') {
            return view('allposts', compact('posts'));
        } else {
            return redirect()->route('post.show', Auth::id())->with('success', 'Post deleted successfully.');
        }
    }

    public function seeallpost()
    {
        $posts = Post::with(['comments' => function ($query) {
            $query->where('status', 'approved');
        }])->get();
        return view('seeallpost', compact('posts'));
    }
}
