<?php
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController; 
use App\Http\Controllers\BorrowController;

// Route untuk CRUD anggota
Route::resource('members', MemberController::class);

// Route untuk CRUD buku
Route::resource('books', BookController::class);

// Route untuk pengembalian buku
Route::get('/borrows', [BorrowController::class, 'index'])->name('borrows.index');
Route::get('/borrows/create', [BorrowController::class, 'borrowForm'])->name('borrows.create');
Route::post('/borrows', [BorrowController::class, 'borrow'])->name('borrows.store');
Route::post('/borrows/return/{id}', [BorrowController::class, 'returnBook'])->name('borrows.return');
