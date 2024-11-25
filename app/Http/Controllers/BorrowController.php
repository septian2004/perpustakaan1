<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $members = Member::with('books')->get();
        return view('borrows.index', compact('members'));
    }

    public function borrowForm()
    {
        $members = Member::all();
        $books = Book::doesntHave('members')->get(); // Buku yang belum dipinjam
        return view('borrows.borrow', compact('members', 'books'));
    }

    public function borrow(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
        ]);

        $member = Member::find($request->member_id);
        $member->books()->attach($request->book_id, [
            'borrowed_at' => now(),
        ]);

        return redirect()->route('borrows.index')->with('success', 'Book borrowed successfully.');
    }

    public function returnBook(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $member->books()->updateExistingPivot($request->book_id, [
            'returned_at' => now(),
        ]);

        return redirect()->route('borrows.index')->with('success', 'Book returned successfully.');
    }
}

