<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SortController extends Controller
{
/**
* Sort books by title Z-A
*/
    public function sorttitle_top(Request $request)
    {
        $books = Book::orderBy('title', 'desc')->get();

        return response()->json([
            'books' => $books
        ]);
    }
/**
* Sort books by title A-Z
*/
    public function sorttitle_bottom(Request $request)
    {
        $books = Book::orderBy('title', 'asc')->get();

        return response()->json([
            'books' => $books
        ]);
    }
/**
* Sort books by published year 10-1
*/
    public function sortyear_top(Request $request)
    {
        $books = Book::orderBy('published_year', 'desc')->get();

        return response()->json([
            'books' => $books
        ]);
    }
/**
* Sort books by published year 1-10
*/
    public function sortyear_bottom(Request $request)
    {
        $books = Book::orderBy('published_year', 'asc')->get();
            
        return response()->json([
            'books' => $books
        ]);
    }
}
