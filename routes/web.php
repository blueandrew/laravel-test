<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/member', [App\Http\Controllers\Member\MemberController::class, 'index']);
Route::post('/member', [App\Http\Controllers\Member\MemberController::class, 'updateMember'])->name('member');
Route::get('/updatePassword', [App\Http\Controllers\Auth\ResetPasswordController::class, 'index']);
Route::post('/updatePassword', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword'])->name('updatePassword');

Route::get('/noteListEdit', [App\Http\Controllers\NoteListEditController::class, 'index']);
Route::post('/noteListEdit', [App\Http\Controllers\NoteListEditController::class, 'noteEdit'])->name('noteListEdit');
Route::post('/delNote', [App\Http\Controllers\NoteListEditController::class, 'delNote'])->name('delNote');
Route::get('/note/{id}', [App\Http\Controllers\NoteListEditController::class, 'getNoteData']);

Route::get('/createNoteShow', [App\Http\Controllers\NoteListEditController::class, 'createNoteShow'])->name('createNoteShow');
Route::post('/createNote', [App\Http\Controllers\NoteListEditController::class, 'createNote'])->name('createNote');

// Auth::routes();
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

// Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');
// Route::get('password/confirm', 'App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
// Route::post('password/confirm', 'App\Http\Controllers\Auth\ConfirmPasswordController@confirm');

Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'index'])->name('password.request');
Route::post('password/resetPassword', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'resetPassword'])->name('password.resetPassword');