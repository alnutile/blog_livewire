<?php

use App\Http\Livewire\PostCreate;
use App\Http\Livewire\PostEdit;
use Illuminate\Support\Facades\Auth;
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


Auth::routes([
  'register' => false,
  'reset' => false,
  'confirm' => false
]);

Route::middleware("auth")->group(function () {
  Route::get("/posts/create", PostCreate::class)->name("posts.create");
  Route::get("/posts/{post}/edit", PostEdit::class)->name("posts.edit");
});

Route::get('/', App\Http\Controllers\HomePageController::class)->name('home');
