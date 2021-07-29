<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      {
        $posts = Posts::orderBy('created_at','desc')->get();
          return view('admin.posts.index', [
            'posts' => $posts
          ]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $category = Categories::orderBy('created_at', 'desc')->get();
        return view('admin.posts.create',[

          'category'=>$category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Posts();
        $post->title = $request->title;
        $post->img = $request->img;
        $post->text = $request->text;
        $post->cat_id = $request->cat_id;
        $post->save();

        return redirect()->back()->withSuccess('Стаття була успішно додана');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
      $category = Categories::orderBy('created_at', 'desc')->get();
        return view('admin.posts.edit',[

          'category'=>$category,
          'posts'=>$posts
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
      $posts->title = $request->title;
      $posts->img = $request->img;
      $posts->text = $request->text;
      $posts->cat_id = $request->cat_id;
      $posts->save();

      return redirect()->back()->withSuccess('Стаття була успішно оновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
        $posts->delete();

        return redirect()->back()->withSuccess('Стаття була успішно видалена');
    }
}
