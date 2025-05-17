<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('allusers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'role' => 'required'
        ]);
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return view('login')->with('success', 'User created successfully.');;
    }



    public function loginmatch(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admindashboard');
            }
            if ($user->role === 'user') {

                return redirect('/user/dashboard');
            }
        }
    }

    public function dashboard()
    {
        $userId = Auth::id();

        $userPostsCount = Post::where('user_id', $userId)->count();
        $userCommentsCount = Comment::where('user_id', $userId)->count();
        $approvedCommentsCount = Comment::where('user_id', $userId)
            ->where('status', 'approved')
            ->count();
        return view('userdashboard', compact('userPostsCount', 'userCommentsCount', 'approvedCommentsCount'));
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        if (Gate::allows('view_user_profile', $user)) {
            return view('userdetails', compact('user'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        Gate::authorize('update_user', $user);
        return view('edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        Gate::authorize('update_user', $user);
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed',
            'role' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        // Only hash and update password if user entered one
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admindashboard')->with('success', 'user updated.');
        } else {
            return redirect('/user/dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/seeusers')->with('success', 'user deleted.');
    }

    public function logout()
    {
        Auth::logout();
        return view('welcome');
    }
}
