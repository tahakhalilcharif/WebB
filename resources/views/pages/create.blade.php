@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Page</h1>
    <form action="{{ route('pages.store', $website->id) }}" method="POST">
        @csrf
        <input type="hidden" name="website_id" value="{{ $website->id }}">
        <div class="form-group">
            <label for="title">Page Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Page Content</label>
            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
