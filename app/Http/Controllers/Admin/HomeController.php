<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;


class HomeController extends Controller
{
  public function index()
    {
      $posts_count = Posts::all()->count();
      $categories_count = Categories::all()->count();

      return view('admin.home.index', [
        'posts_count' => $posts_count,
        'categories_count' => $categories_count

      ]);
    }
}
