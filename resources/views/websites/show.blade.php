@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $website->name }}</h1>
    <a href="{{ route('pages.create', $website->id) }}" class="btn btn-primary">Add New Page</a>
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
    <ul class="list-group mt-3">
        @foreach ($website->pages as $page)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $page->title }}
                <span>
                    <a href="{{ route('pages.show', [$website->id, $page->id]) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('pages.edit', [$website->id, $page->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pages.destroy', [$website->id, $page->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
</div>
@endsection
