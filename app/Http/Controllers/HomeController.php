<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\storePostRequest;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 /*    public function testroot()
    {
        dd("This is the root path");
    } */


    public function index()
    {
        //$data = Post::all();
        $data = Post :: orderBy('id','desc')->get();
        //dd($data);
        return view('home',compact('data'));
        //dd($data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd('create methods');
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePostRequest $request)
    {
        // Retrieve the validated input...
        $validated = $request->validated();
        Post::create($validated);
/*         Post:: create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category,
        ]); */
        return redirect('/posts');
        //dd("store methods");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function show($id)
    {
        //dd($id);
        //select * from posts where id=$id;
        //$post = Post::find($id);
        $post = Post::findOrFail($id);
        //dd($post);
        return view('show',compact('post'));
    }*/
    public function show(Post $post)
    {
        //dd($post->categories->name);
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*     public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit',compact('post'));
        //dd($id);
    } */

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('edit',compact('post', 'categories'));
        //dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*     public function update(Request $request, $id)
    {
        //dd('update');
        $post = Post::findOrFail($id);// get old data 
        $post->name = $request->name;
        $post->description = $request->description;
        
        $post->save();
        return redirect('/posts');
    } */

    public function update(storePostRequest $request,Post $post)
    {
        $validated = $request->validated();
        $post ->update($validated);
/*         $post->create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,     
        ]); */
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*     public function destroy($id)
    {
        //dd($id);
        Post::findOrFail($id)->delete();
        return redirect('/posts');
    } */

    public function destroy(Post $post)
    {
        //dd($id);
        $post->delete();
        return redirect('/posts');
    }
}
