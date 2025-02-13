<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SortController extends Controller
{
    public function sorttitle_top(Request $request)
    {
        $authors = Book::orderBy('title', 'asc')->get();

        return response()->json([
            'authors' => $authors
        ]);
    }
}
