@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>
        <div class="mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>
        <div class="mb-3">
            <label>Publisher</label>
            <input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}">
        </div>
        <div class="mb-3">
            <label>Year</label>
            <input type="number" name="year" class="form-control" value="{{ $book->year }}">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $book->description }}</textarea>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
