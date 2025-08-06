@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">My Articles</h1>
        <a href="" class="btn btn-primary mb-3">+ New Article</a>
        @foreach ($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h5></h5>
                    <p></p>
                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                    <form action="" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection