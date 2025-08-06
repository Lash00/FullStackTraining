@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Articles</h1>
            @auth
                <a href="{{ route('articles.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i> Create Article
                </a>
            @endauth
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show p-4" role="alert">
                <p>{{ session('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            @forelse($articles as $article)
                <div class="card my-3">
                    <div class="card-body">
                        <h4>{{ $article->title }}</h4>
                        <p>{{ $article->body }}</p>
                        <p class="text-muted">By {{ $article->user->name }}</p>

                        @can('update', $article)
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endcan

                        @can('delete', $article)
                            <form method="POST" action="{{ route('articles.destroy', $article->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endcan
                        <div class="flex-shrink-0 mt-2 w-25">
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-journal-text display-1 text-muted"></i>
                        <h3 class="mt-3">No Articles Yet</h3>
                        <p class="text-muted">Be the first to create an article!</p>
                        <a href="{{ route('articles.create') }}" class="btn btn-primary">
                            Create Your First Article
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection