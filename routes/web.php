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
Route::get('/chat/{unique_name}/@{username}', [App\Http\Controllers\ChatController::class, 'chat'])->name('chat.view');
Route::get('/enter-chat/{unique_name}', [App\Http\Controllers\ChatController::class, 'enter'])->name('chat.enter');
Route::post('/enter-chat/{unique_name}', [App\Http\Controllers\ChatController::class, 'enter'])->name('chat.enter');
Route::get('/chat-invite/{unique_name}', [App\Http\Controllers\ChatController::class, 'invite'])->name('chat.invite');
Route::post('/join/{unique_name}', [App\Http\Controllers\ChatController::class, 'join'])->name('chat.join');
