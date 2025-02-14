<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SortController extends Controller
{

    public function sorttitle_top(Request $request)
    {
        $authors = Book::orderBy('title', 'desc')->get();

        return response()->json([
            'authors' => $authors
        ]);
    }

    public function sorttitle_bottom(Request $request)
    {
        $authors = Book::orderBy('title', 'asc')->get();

        return response()->json([
            'authors' => $authors
        ]);
    }

    public function sortyear_top(Request $request)
    {
        $authors = Book::orderBy('published_year', 'desc')->get();

        return response()->json([
            'authors' => $authors
        ]);
    }

    public function sortyear_bottom(Request $request)
    {
        $authors = Book::orderBy('published_year', 'asc')->get();

        return response()->json([
            'authors' => $authors
        ]);
    }
}
