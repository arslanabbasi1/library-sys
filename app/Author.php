<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
use App\Borrow;

class Author extends Model
{
    protected $fillable = [
        'name',
        'remaining_balance'
    ];
    public function books(){
        return $this->hasmany('App\Book');
    }
    public function borrow(){
        return $this->belongsTo('App\Borrow');
    }
}
