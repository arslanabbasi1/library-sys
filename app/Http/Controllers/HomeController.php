<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Book;
use App\Rack;
use App\User;
use App\Author;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $racks = Rack::all();
        return view('home', ['racks' => $racks]);
    }
    public function admin(){
        return view('admin');
    }
    public function search(Request $request){
        $book = $request->book;
        $books = Book::where('name', 'LIKE', '%'.$book.'%')->get();

        if (count($books)>0) {
            return view('search')->with('books', $books);
        }else {
            return redirect('home')->with('message', 'No Details found. Try to search again!');
        }
    }
    public function users(){
        $users = User::all();
        return view('users', ['users' => $users]);
    }
    public function borrow(){
        $books = Book::all();
        $authors = Author::all();
        return view('borrow', ['books' => $books, 'authors' => $authors]);
    }
}
