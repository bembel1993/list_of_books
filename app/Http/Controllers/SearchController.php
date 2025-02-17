<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
/**
* Search books by author and published year
*/
    public function show_auth(Request $request)
    {
        $books = Book::orderBy('id', 'desc')->get();

        if($request->keyword_auth)
        {
            if($request->keyword_auth != '')
            {
                $books = Book::where('author','LIKE','%'.$request->keyword_auth.'%')->get();
            } 
            return response()->json([
                'books' => $books
            ]);
        }

        if($request->keyword_pubyear)
        {
            if($request->keyword_pubyear != '')
            {
                $books = Book::where('published_year','LIKE','%'.$request->keyword_pubyear.'%')->get();
            }
            return response()->json([
                'books' => $books
            ]);
        }
    }
}
