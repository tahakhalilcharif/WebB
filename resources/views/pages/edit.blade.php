@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Page</h1>
    <form action="{{ route('pages.update', $page->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Page Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Page Content</label>
            <textarea class="form-control" id="content" name="content" rows="5">{{ $page->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
