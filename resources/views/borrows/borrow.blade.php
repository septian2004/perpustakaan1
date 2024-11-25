@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Borrow a Book</h1>
    <form action="{{ route('borrows.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Member</label>
            <select name="member_id" class="form-control" required>
                <option value="">Select Member</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Book</label>
            <select name="book_id" class="form-control" required>
                <option value="">Select Book</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Borrow</button>
        <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
