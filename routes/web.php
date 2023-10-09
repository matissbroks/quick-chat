<?php

use App\Models\Chat;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\ChatController::class, 'index'])->name('chat.index');
Route::post('/chat-save', [App\Http\Controllers\ChatController::class, 'save'])->name('chat.save');
Route::get('/chat/{unique_name}', [App\Http\Controllers\ChatController::class, 'chat'])->name('chat.view');
