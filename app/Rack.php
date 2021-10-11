<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Rack extends Model
{
    protected $fillable = [
        'name'
    ];
    public function books(){
        return $this->hasmany('App\Book');
    }
}
