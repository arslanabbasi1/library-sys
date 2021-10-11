<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Author extends Model
{
    protected $fillable = [
        'name',
        'remaining_balance'
    ];
    public function books(){
        return $this->hasmany('App\Book');
    }
}
