<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'id',
      'name',
      'role'
    ];

    public function imagelists() {
      return $this->hasMany('App\Models\Image');
    }
    public function newslists() {
      return $this->hasMany('App\Models\News');
    }
}
