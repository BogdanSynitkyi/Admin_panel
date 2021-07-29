<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Posts extends Model
{
    use HasFactory;

    public function category()
  {
    return $this->belongsTo('App\Models\Categories', 'cat_id');
  }

}
