<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MusicFileController;
use App\Http\Controllers\SettingInvitationController;

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

Route::get('/', [HomeController::class, 'index']);
Route::post('/store-message', [MessageController::class, 'store'])->name('messages.store');
Route::get('/messages/list', [MessageController::class, 'list'])->name('messages.list');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:administrator'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['auth', 'role:administrator'])->group(function () {
    Route::get('/guest', [GuestController::class, 'index'])->name('guest.index');
    Route::get('/guest/search', [GuestController::class, 'search'])->name('guest.search');
    Route::post('/guest', [GuestController::class, 'store'])->name('guest.store');
    Route::put('/guest/{guest}', [GuestController::class, 'update'])->name('guest.update');
    Route::post('guest/import', [GuestController::class, 'import'])->name('guest.import');
    Route::delete('/guest/{guest}', [GuestController::class, 'destroy'])->name('guest.destroy');

});

Route::middleware(['auth', 'role:administrator'])->group(function () {
    Route::get('/setting-invitation', [SettingInvitationController::class, 'index'])->name('setting-invitation.index');
    Route::post('/setting-invitation', [SettingInvitationController::class, 'storeOrUpdate'])->name('setting-invitation.storeOrUpdate');
});

Route::middleware(['auth', 'role:administrator'])->group(function () {
    Route::resource('gallery', GalleryController::class);
});

Route::middleware(['auth', 'role:administrator'])->group(function () {
    Route::resource('music', MusicFileController::class);
    Route::patch('music/{music}/toggle-status', [MusicFileController::class, 'toggleStatus'])->name('music.toggleStatus');
});

Route::middleware(['auth', 'role:administrator'])->group(function () {
    Route::get('/message', [MessageController::class, 'index'])->name('message.index');
    Route::get('/message/search', [MessageController::class, 'search'])->name('message.search');
    Route::post('/message', [MessageController::class, 'store'])->name('message.store');
    Route::put('/message/{message}', [MessageController::class, 'update'])->name('message.update');
    Route::delete('/message/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
});
