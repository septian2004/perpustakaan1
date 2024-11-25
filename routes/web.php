<?php
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController; 
use App\Http\Controllers\BorrowController;


// Route untuk CRUD anggota
Route::resource('members', MemberController::class);
=======
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/test', function() {
    return 'Test';
});


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return 'Selamat datang di Dashboard!';
})->middleware('auth')->name('dashboard');
=======
Route::get('/login', function() {
    return view('login');
});

=======

// Route untuk CRUD buku
Route::resource('books', BookController::class);

// Route untuk pengembalian buku
Route::get('/borrows', [BorrowController::class, 'index'])->name('borrows.index');
Route::get('/borrows/create', [BorrowController::class, 'borrowForm'])->name('borrows.create');
Route::post('/borrows', [BorrowController::class, 'borrow'])->name('borrows.store');
Route::post('/borrows/return/{id}', [BorrowController::class, 'returnBook'])->name('borrows.return');

