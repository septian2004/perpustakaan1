@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Member</h1>
    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
