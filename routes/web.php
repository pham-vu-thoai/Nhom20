<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\postController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index']);

// admin
Route::get('/login',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'register']);
Route::get('/forgotpassword',[AuthController::class,'forgotpassword']);
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');


//user admin
Route::get('/users', [usersController::class,'index'])->name('users');
Route::get('/users/create', [usersController::class,'create'])->name('users.create');
Route::post('/users', [usersController::class,'store'])->name('users.store');
Route::get('/users/{id}/edit', [usersController::class,'edit'])->name('users.edit');
Route::put('/users/{id}', [usersController::class,'update'])->name('users.update');
Route::delete('/users/{id}', [usersController::class,'destroy'])->name('users.destroy');

//post
Route::get('/post', [postController::class,'index',])->name('post');
Route::post('post/upload', [postController::class, 'uploadImage'])->name('post.upload');
Route::get('/post/create', [postController::class,'create'])->name('post.create');
Route::post('/post', [postController::class,'store'])->name('post.store');
Route::get('/post/{id}/edit', [postController::class,'edit'])->name('post.edit');
Route::put('/post/{id}', [postController::class,'update'])->name('post.update');
Route::delete('/post/{id}', [postController::class,'destroy'])->name('post.destroy');
Route::get('/post/show/{slug}', [postController::class,'show',])->name('post.show');

