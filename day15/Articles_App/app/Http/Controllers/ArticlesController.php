<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ArticlesController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all articles with their user relationship loaded (eager loading)
        $articles = Article::with('user')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the form data
        $data = $request->validate([
            'title' => 'required|string|max:255', // Title is required, max 255 characters
            'body' => 'required|string',          // Body is required
        ]);

        // Create article for the current user
        $request->user()->articles()->create($data);

        // Redirect with success message
        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        // Validate the form data
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Update the article
        $article->update($data);

        // Redirect with success message
        return redirect()->route('articles.index')->with('success', 'Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Check if user can delete this article (authorization)
        $this->authorize('delete', $article);

        // Delete the article
        $article->delete();

        // Redirect with success message
        return redirect()->route('articles.index')->with('success', 'Article deleted!');
    }
}