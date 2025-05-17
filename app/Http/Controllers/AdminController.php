<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $admin = User::findOrFail($id);
        if (Gate::allows('view_admin_profile', $admin)) {
            return view('admindetails', compact('admin'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function dashboard()
    {
        $totalCategory = Category::count();
        $totalPosts = Post::count();
        $approvedComments = Comment::where('status', 'approved')->count();
        $totalComments = Comment::count();
        $pendingComments = Comment::where('status', 'pending')->count();
        $totalUsers = User::count();

        return view(
            'admindashboard',
            compact('totalPosts', 'totalComments', 'pendingComments', 'totalUsers', 'totalCategory', 'approvedComments')
        );
    }

    public function logout()
    {
        Auth::logout();
        return view('welcome');
    }
}
