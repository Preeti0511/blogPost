<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // public $guarded = false;
    protected $guarded = [];
    public function post(){
        return $this->hasMany(Post::class);
    }

  
}
