<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomePage;

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

// Public portfolio page. Accepts an optional locale ("pt" or "en") as the first
// segment of the URL. This route returns a Livewire component which renders
// the complete front‑end and handles the contact form. If no locale is
// provided, Portuguese is used by default.
Route::get('/{locale?}', HomePage::class)
    ->name('home')
    ->where('locale', 'en|pt');
