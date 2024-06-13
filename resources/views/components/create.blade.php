@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Component for {{ $page->title }}</h1>
    <form action="{{ route('components.store', ['website' => $website->id, 'page' => $page->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type">Component Type</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>
        <div class="form-group">
            <label for="content">Component Content</label>
            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
