<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CategoryGate;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/admin/seedetails', AdminController::class)->middleware('can:isAdmin');
Route::resource('/category', CategoryController::class)->middleware(['auth', 'can:isAdmin']);
Route::resource('/post', controller: PostController::class)->middleware('auth');
// Route::resource('/users', UserController::class)->middleware('auth');

// Route::get('/users', [UserController::class, 'index'])
//     ->middleware(['auth','isAdmin'])
//     ->name('users.index');

Route::get('/users', [UserController::class, 'index'])
    ->middleware(['auth', 'isAdmin'])  // ✅ only index is protected
    ->name('users.index');

Route::resource('/users', UserController::class)->except(['index']);


Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::post("loginmatch", [UserController::class, 'loginmatch'])->name('loginmatch');

Route::get('login', function () {
    return view('login');
})->name('login');

// Route::get("login", [UserController::class, 'create'])->name('login');
Route::get("register", [UserController::class, 'create'])->name('register');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admindashboard')
    ->middleware(['auth', IsAdmin::class]);


// Route::get('/user/dashboard', [UserController::class, 'dashboard'])
//     ->name('userdashboard')
//     ->middleware(['auth', IsUser::class]);


Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('userdashboard')->middleware('auth');

// Route::middleware(['auth', CategoryGate::class])
//     ->get('/category/create', [CategoryController::class, 'create'])
//     ->name('category.create');


Route::get('admin/logout', [AdminController::class, 'logout'])->name('adminlogout');
Route::get('admin/seeusers', [UserController::class, 'index'])->name('seeusers')->middleware('can:isAdmin');;
Route::resource('/comment', CommentController::class)->middleware('auth');
Route::get('seeallpost',[PostController::class,'seeallpost'])->name('seeallpost')->middleware(['auth']);

Route::patch('/comments/{comment}/toggle', [CommentController::class, 'toggleStatus'])->name('comments.toggle')->middleware('can:isAdmin');


