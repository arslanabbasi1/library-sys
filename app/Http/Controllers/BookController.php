<?php

namespace App\Http\Controllers;

use App\Book;
use App\Rack;
use Illuminate\Http\Request;

class BookController extends Controller{
    public function index(){
        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }
    public function create(){
        $racks = Rack::all();
        return view('books.create', ['racks' => $racks]);
    }
    public function store(){
        $rack = Rack::find(request('rack_id'));
        if (count($rack->books) >= 10){
            return redirect('admin/books')->with('message', 'error | You cannot add more than 10 books');
        } else {
            request()->validate([
                'name' => 'required',
                'author_name' => 'required',
                'published_year' => 'required',
                'rack_id' => 'required'
            ]);
            Book::create([
                'name' => request('name'),
                'author_name' => request('author_name'),
                'published_year' => request('published_year'),
                'rack_id' => request('rack_id')
            ]);
            return redirect('admin/books');
        }
    }
    public function edit(Book $book){
        $racks = Rack::all();
        return view('books.edit', ['book' => $book, 'racks' => $racks]);
    }
    public function update(Book $book){
        request()->validate([
            'name' => 'required',
            'author_name' => 'required',
            'published_year' => 'required',
            'rack_id' => 'required'
        ]);
        $book->update([
            'name' => request('name'),
            'author_name' => request('author_name'),
            'published_year' => request('published_year'),
            'rack_id' => request('rack_id')
        ]);
        return redirect('admin/books');
    }
    public function destroy(Book $book){
        $book->delete();
        return redirect('admin/books');
    }
}
