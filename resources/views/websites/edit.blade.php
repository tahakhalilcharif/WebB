@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Website</h1>
    <form action="{{ route('websites.update', $website->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Website Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $website->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
