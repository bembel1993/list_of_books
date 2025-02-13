<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CrudController extends Controller
{
    public function showformedit($id)
    {
        $book = Book::find($id);
        return view('books.formedit', compact('book'));
    }

    public function showformcreate()
    {
        return view('books.formcreate');
    }

    public function create_bk(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|numeric',
            'isbn' => 'required',
        ]);
        Book::create($validatedData);
        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }

    public function read_bk()
    {
        $books = Book::orderBy('id', 'desc')->get();;
        return view('books.index', compact('books'));
    }

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

    public function delete_bk($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
