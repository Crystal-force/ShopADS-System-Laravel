<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $fillable = [
    'id',
    'content',
    'role',
    'category_id'
  ];

  public function categorylist() {
    return $this->belongsTo('App\Models\category', 'category_id');
  }
}
