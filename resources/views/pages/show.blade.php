@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $page->title }}</h1>
    <a href="{{ route('components.create', ['website' => $page->website_id, 'page' => $page->id]) }}" class="btn btn-primary">Add New Component</a>
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
    <ul class="list-group mt-3">
        @foreach ($page->components as $component)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $component->type }}
                <span>
                    <a href="{{ route('components.show', $component->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('components.edit', $component->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('components.destroy', $component->id) }}" method="POST" style="display:inline;">
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
