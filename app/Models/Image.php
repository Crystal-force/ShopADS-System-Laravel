<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $fillable = [
    'id',
    'image',
    'role',
    'time',
    'position',
    'category_id'
  ];

  public function categorylist() {
    return $this->belongsTo('App\Models\category', 'category_id');
  }
}
