<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rack;

class Book extends Model
{
    protected $fillable = [
        'name',
        'author_name',
        'published_year',
        'rack_id'
    ];
    protected $guarded = [];
    public function rack(){
        return $this->belongsTo('App\Rack', 'rack_id');
    }
}
