<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\HomeController as AdminHome;
use App\Http\Controllers\Web\PostController as webPostController;
use App\Http\Controllers\Web\CategoryController as WebCategoryController;
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

//start Dashboard
Route::middleware('auth' ,'IsAdmin')->group(function () {

Route::get('/AlamerDashboard', [AdminHome::class, 'admin_dashboard']);
//users
Route::get('/users', [UserController::class, 'index']);
Route::post('dashboard/user/update', [UserController::class,'update']);
Route::post('dashboard/user/delete', [UserController::class,'delete']);
//settings
Route::get('dashboard/settings', [SettingsController::class, 'index']);
Route::get('dashboard/settings/edit/{id}', [SettingsController::class,'edit']);
Route::post('dashboard/settings/update', [SettingsController::class,'update']);


//start Categories
Route::get('dashboard/category', [CategoryController::class, 'getCategories']);
Route::post('dashboard/store/category' , [CategoryController::class,'store']);
Route::get('dashboard/category/edit/{id}', [CategoryController::class,'edit']);
Route::post('dashboard/category/update', [CategoryController::class,'update']);
Route::post('dashboard/category/delete', [CategoryController::class,'delete']);
//start Posts
Route::get('dashboard/post', [PostController::class, 'index']);
Route::get('dashboard/add/post', [PostController::class, 'add']);
Route::post('store/post' , [PostController::class,'store']);
Route::get('dashboard/post/edit/{id}/{title_slug}', [PostController::class,'edit']);
Route::get('dashboard/post/show/{id}/{title_slug}', [PostController::class,'show']); 
Route::post('dashboard/post/update', [PostController::class,'update']);
Route::post('dashboard/post/delete', [PostController::class,'delete']);
Route::get('dashboard/post/toggle/{id}',[PostController::class,'toggle']);
Route::get('dashboard/post/popular/{id}',[PostController::class,'popular']);

});
//end Dashboard

//start web
//start Categories
Route::get('/', [WebCategoryController ::class, 'index']);
Route::get('/category/{id}/{title_slug}', [WebCategoryController ::class, 'show']);
Route::get('/post/{id}/{title_slug}', [webPostController ::class, 'showDetile']);
//end web
Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
