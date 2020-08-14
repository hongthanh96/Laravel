<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::orderBy('created_at','desc')->get();
        $book_act = Book::where('active',1)->get();
        $book_noact = Book::where('active',0)->get();
        $categories = Category::all();
        return view('BookSrore.index',compact('books','book_act','book_noact','categories'));
    }

    public function create(BookRequest $request)
    {
        $requests = $request->all();
         Book::create($requests);
         return redirect('/books');

    }

    public function edit($id){
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('BookSrore.editbook',compact('book','categories'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(BookRequest $request)
    {

        $book = Book::find($request->id);
        $book->title = $request->title;
        $book->name = $request->name;
        $book->description = $request->description;
        $book->active = $request->active;
        $book->category_id = $request->category_id;
        $book->save();
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
