<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorStoreRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('authors.index', [
            'authors' => Author::withCount('books')->get(),
        ]);
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(AuthorStoreRequest $request)
    {
        Author::create($request->validated());

        return to_route('authors.index')->with('success', 'Author created');
    }

    // public function show(Author $author)
    // {
    //     $author->load('books');
    //     return view('authors.show', compact('author'));
    // }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(AuthorStoreRequest $request, Author $author)
    {
        $author->fill( $request->all() );

        $author->save();

        return to_route('authors.index')->with('success', 'Author updated');
    }

    // public function destroy(Author $author)
    // {
    //     $author->delete();
    //     return to_route('authors.index')->with('success', 'Author deleted');
    // }
}
