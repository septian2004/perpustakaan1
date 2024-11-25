@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Borrowed Books</h1>
    <a href="{{ route('borrows.create') }}" class="btn btn-primary">Borrow a Book</a>
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Member</th>
                <th>Book</th>
                <th>Borrowed At</th>
                <th>Returned At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                @foreach($member->books as $book)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->pivot->borrowed_at }}</td>
                        <td>{{ $book->pivot->returned_at ?? 'Not returned' }}</td>
                        <td>
                            @if(!$book->pivot->returned_at)
                                <form action="{{ route('borrows.return', $member->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    <button class="btn btn-success">Return</button>
                                </form>
                            @else
                                <span class="text-muted">Returned</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection
