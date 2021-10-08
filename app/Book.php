<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rack;
use App\Author;

class Book extends Model
{
    protected $fillable = [
        'name',
        'author_id',
        'published_year',
        'rack_id'
    ];
    protected $guarded = [];
    public function author(){
        return $this->belongsTo('App\Author', 'author_id');
    }
    public function rack(){
        return $this->belongsTo('App\Rack', 'rack_id');
    }
}
