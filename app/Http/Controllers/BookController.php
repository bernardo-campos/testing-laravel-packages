<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index', [
            'books' => Book::with('author')->get(),
        ]);
    }

    public function create()
    {
        return view('books.create', [
            'authors' => Author::all(),
        ]);
    }

    public function store(BookStoreRequest $request)
    {
        Book::create( $request->validated() );

        return to_route('books.index')->with('success', 'Book created');
    }

    // public function show(Book $book)
    // {
    //     return view('books.show', compact('book'));
    // }

    public function edit(Book $book)
    {
        return view('books.edit', [
            'book' => $book,
            'authors' => Author::all(),
        ]);
    }

    public function update(BookStoreRequest $request, Book $book)
    {
        $book->fill( $request->all() );

        $book->save();

        return to_route('books.index')->with('success', 'Book updated');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return to_route('books.index')->with('success', 'Book deleted');
    }
}
