@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Websites</h1>
    <a href="{{ route('websites.create') }}" class="btn btn-primary">Create New Website</a>
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
    <ul class="list-group mt-3">
        @foreach ($websites as $website)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $website->name }}
                <span>
                    <a href="{{ route('websites.show', $website->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('websites.edit', $website->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('websites.destroy', $website->id) }}" method="POST" style="display:inline;">
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
