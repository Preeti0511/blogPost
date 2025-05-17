<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
        $comments = Comment::get();
        return view('seeallcomments', compact('comments', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::get();
        return view('addcomment', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',

            'content' => 'required',

        ]);

        $comment = Comment::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'status' => 'pending'
        ]);
        return redirect()->route('comment.show', Auth::id());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $comments = Comment::where('user_id', Auth::id())->get();

        return view('viewsinglecomments', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        $posts  = Post::get();
        Gate::authorize('update_comment', $comment);
        return view('updatecomment', compact('comment', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',

            'content' => 'required',

        ]);
        $comment = Comment::findOrFail($id);
        $comment->update([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'status' => 'pending'
        ]);
        return redirect()->route('comment.show', Auth::id());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('comment.index');
    }

    public function toggleStatus(Comment $comment)
    {
        $comment->status = $comment->status === 'approved' ? 'pending' : 'approved';
        $comment->save();

        return redirect()->back()->with('success', 'Comment status updated.');
    }
}
