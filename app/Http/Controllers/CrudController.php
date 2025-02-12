<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CrudController extends Controller
{
    public function read_books()
    {
        $books = Book::all();
        
        return view('books.index', compact('books'));
    }
}
