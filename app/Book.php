<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rack;
use App\Author;
use App\Borrow;

class Book extends Model
{
    protected $fillable = [
        'name',
        'author_id',
        'published_year',
        'rack_id',
        'price'
    ];
    protected $guarded = [];
    public function author(){
        return $this->belongsTo('App\Author', 'author_id');
    }
    public function rack(){
        return $this->belongsTo('App\Rack', 'rack_id');
    }
    public function borrow(){
        return $this->hasMany('App\Borrow');
    }
}
