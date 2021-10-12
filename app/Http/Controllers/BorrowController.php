<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\Book;
use App\Author;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class BorrowController extends Controller{
    public function receipt($id){
        $borrow = Borrow::find($id);
        return view('receipt', ['borrow' => $borrow]);
    }
    public function borrow(Request $request){
        $validated = $request->validate([
            'book_id' => 'required',
            'days' => 'required'
        ]);
        $user = Auth::user();
        $book = Book::find($request->book_id);
        $borrow = Borrow::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'book_name' => $book->name,
            'price' => $book->price,
            'author_id' => $book->author_id,
            'days' => request('days'),
            'total_price' => $book->price * request('days')
        ]);
        return redirect('home/borrow/'.$borrow->id.'/receipt');
    }
}
