<?php
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController; 
use App\Http\Controllers\BorrowController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return redirect('/buku');
});


Route::resource('buku', BukuController::class);

use App\Http\Models\User;

// Rute Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
})->name('login.submit');

// Rute Register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    \App\Models\User::create([
        'nama' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
    ]);

    return redirect('/login')->with('success', 'Pendaftaran berhasil. Silakan login.');
})->name('register.submit');

// Rute Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Rute Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login')->with('success', 'Anda berhasil logout.');
})->name('logout');
=======

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
=======

// Route untuk CRUD buku
Route::resource('books', BookController::class);

// Route untuk pengembalian buku
Route::get('/borrows', [BorrowController::class, 'index'])->name('borrows.index');
Route::get('/borrows/create', [BorrowController::class, 'borrowForm'])->name('borrows.create');
Route::post('/borrows', [BorrowController::class, 'borrow'])->name('borrows.store');
Route::post('/borrows/return/{id}', [BorrowController::class, 'returnBook'])->name('borrows.return');


