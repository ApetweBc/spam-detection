<?php

use App\Honeypot\Honeypot;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('post/create', function () {
         return view('/post/create');
})->middleware('auth')->name('post.create');


Route::post('/post', function () {






    Post::create(
        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ])
        );

        return 'published';

})->middleware('auth')->middleware(Honeypot::class);
require __DIR__.'/auth.php';
