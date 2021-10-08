<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller{
    public function index(){
        $authors = Author::all();
        return view('authors.index', ['authors' => $authors]);
    }
    public function create(){
        return view('authors.create');
    }
    public function store(){
            request()->validate([
                'name' => 'required',
                'remaining_balance' => 'required',
            ]);
            Author::create([
                'name' => request('name'),
                'remaining_balance' => request('remaining_balance')
            ]);
            return redirect('admin/authors');
    }
    public function edit(Author $author){
        return view('authors.edit', ['author' => $author]);
    }
    public function update(Author $author){
        request()->validate([
            'name' => 'required',
            'remaining_balance' => 'required'
        ]);
        $author->update([
            'name' => request('name'),
            'remaining_balance' => request('remaining_balance'),
        ]);
        return redirect('admin/authors');
    }
    public function destroy(Author $author){
        $author->delete();
        return redirect('admin/authors');
    }
}
