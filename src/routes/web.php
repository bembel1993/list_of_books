<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SortController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('books.formedit/{id}', [CrudController::class, 'showformedit']);
Route::put('updateindb/{id}', [CrudController::class, 'update_bk']);
Route::get('books.delete/{id}', [CrudController::class, 'delete_bk']);

Route::get('/books',[CrudController::class,'read_bk']);
Route::post('/books/search',[SearchController::class,'show_auth'])->name('authors.search');

Route::post('/books/sortbytitlebottom',[SortController::class,'sorttitle_bottom'])->name('bytitlebottom.sort');
Route::post('/books/sortbytitletop',[SortController::class,'sorttitle_top'])->name('bytitletop.sort');
Route::post('/books/sortbyyeartop',[SortController::class,'sortyear_top'])->name('byyeartop.sort');
Route::post('/books/sortbyyearbottom',[SortController::class,'sortyear_bottom'])->name('byyearbottom.sort');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'CrudController@read_bk')->name('books.index');
    Route::get('/formcreate', 'CrudController@showformcreate')->name('books.formcreate');
    Route::post('/addindb', 'CrudController@create_bk')->name('books.create');
});

require __DIR__.'/auth.php';
