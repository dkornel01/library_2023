<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){
        return Book::all();
    }

    public function show($id){
        return Book::find($id);
    }

    public function destroy($id){
        Book::find($id)->delete();
    }

    public function update(Request $request, $id){
        $book = Book::find($id);
        $book->author = $request->author;
        $book->title = $request->title;
        
        $book->save();
        //még nem létezik...
        //return redirect('/book/list');
    }

    public function store(Request $request){
        $book = new Book();
        $book->author = $request->author;
        $book->title = $request->title;
        
        $book->save();
        //még nem létezik...
        //return redirect('/book/list');
    }

    //view függvények
    public function listView(){
        $books = Book::all();
        return view('book.list', ['books' => $books]);
    }

    //with függvények
    public function bookCopy(){
        //a modelben megírt függvényre hivatkozunk..
        return Book::with('copy')->get();
    }

    public function publication($book_id)
    {
        $copies=DB::table('copies as c')
        ->select('hardcovered','publication','status')
        ->join('books as b','c.book_id','=','b.book_id')
        ->where('b.book_id',$book_id)
        ->where('publication','>',2000)
        ->get();
        return $copies;
    }
    public function publication2($book_id)
    {
        $copies=DB::select('SELECT * hardcovered ,status,publication From copies c INNER JOIN books b on b.book_id=c book_id WHERE publication>2000 AND b.book_id=$book_id');
        return $copies;
    }
}
