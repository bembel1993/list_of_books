<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Validation\Rules\Isbn;
use App\Models\Book;

class CrudController extends Controller
{
/**
* Show form edit
* @param int $id The ID of the book to edit. 
* @return 
*/
    public function showformedit($id)
    {
        $book = Book::find($id);
        return view('books.formedit', compact('book'));
    }
/**
* Show form create
*/
    public function showformcreate()
    {
        return view('books.formcreate');
    }
/**
* Create data API
*/
    public function create_bk(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'published_year' => 'required|numeric|min:1000|max:2999',
            'isbn' => 'required|string|min:14|max:20', //new Isbn(),
        ]);
        Book::create($validatedData);
        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }
/**
* Read data API
*/
    public function read_bk()
    {
        $books = Book::orderBy('id', 'desc')->paginate(10);
        return view('books.index', compact('books'));
    }
/**
* Update data API
*/
    public function update_bk(Request $request, $id)
    {
        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->published_year = $request->input('published_year');
        $book->isbn = $request->input('isbn');
        $book->update();
        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }
/**
* Delete data API
*/
    public function delete_bk($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
