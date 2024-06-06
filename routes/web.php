<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::post('/contact', [SiteController::class, 'sendContact'])->name('sendMessage');
Route::get('/posts/{slug}', [SiteController::class, 'postDetail'])->name('postDetail');
Route::get('/tags/{slug}', [SiteController::class, 'tagsPost'])->name('tagsPost');
Route::get('/category/{slug}', [SiteController::class, 'categoryPosts'])->name('categoryPosts');
Route::get('/search}', [SiteController::class, 'search'])->name('search');
Route::get('lang/{lang}', [SiteController::class, 'language'])->name('language');

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['verified'])->name('dashboard');
    Route::resource('categories', CategoriesController::class);
    Route::resource('posts', PostController::class);
    Route::resource('tags', TagController::class);
    Route::post('post-image-upload', [PostController::class, 'upload'])->name('upload');
    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users', UserController::class)->except('show');
        Route::resource('roles', RoleController::class)->except('show');
        Route::resource('permissions', PermissionController::class)->except('show');
    });
});


Route::middleware('auth')->name('admin.')->group(function () {
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('admin/profile', [PostController::class, 'upload'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
