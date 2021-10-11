<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
use App\Author;
use App\User;

class Borrow extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'author_id',
        'book_id',
        'total_price'
    ];
    protected $guarded = [];
    public function book(){
        return $this->hasMany('App\Book', 'book_id');
    }
    public function author(){
        return $this->hasMany('App\Author', 'author_id');
    }
    public function user(){
        return $this->hasMany('App\User', 'user_id');
    }
}
