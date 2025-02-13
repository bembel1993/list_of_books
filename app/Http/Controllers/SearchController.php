<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    public function show_auth(Request $request)
    {
        $authors = Book::all();

        if($request->keyword_auth)
        {
            if($request->keyword_auth != '')
            {
                $authors = Book::where('author','LIKE','%'.$request->keyword_auth.'%')->get();
            } 
            return response()->json([
                'authors' => $authors
            ]);
        }

        if($request->keyword_pubyear)
        {
            if($request->keyword_pubyear != '')
            {
                $authors = Book::where('published_year','LIKE','%'.$request->keyword_pubyear.'%')->get();
            }
            return response()->json([
                'authors' => $authors
            ]);
        }
    }
}
