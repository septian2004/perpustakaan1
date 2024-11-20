use App\Http\Controllers\MemberController;

// Route untuk CRUD anggota
Route::resource('members', MemberController::class);
