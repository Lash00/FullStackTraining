@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Article</h2>

        <form method="POST" action="{{ route('articles.update', $article->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Body</label>
                <textarea name="body" class="form-control" rows="5" required>{{ old('body', $article->body) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Article</button>
        </form>
    </div>
@endsection