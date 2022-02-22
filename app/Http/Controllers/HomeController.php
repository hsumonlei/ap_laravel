<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Mail\PostStored;
use App\Models\Category;
use App\Mail\PostCreated;

use Illuminate\Http\Request;
use App\Events\PostCreatedEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\storePostRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostCreatedNotification;


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

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        //dd(Post::all());
        //$data = Post::all();
        //dd(auth()->user()->id);

/*         //dd(config('aprogrammer.info.created'));
        Mail::raw('Hello World', function($msg){
            $msg->to('hsulei@gmail.com')->subject("AP Index Function");//demo purpose
        }); */

/*    Notification
    // $user = User::find(31);
        //$user->notify(new PostCreatedNotification());
        
        //Notification::send(User::find(31),new PostCreatedNotification());//use facades
        //echo 'noti sent'; exit(); */

        $data = Post :: where('user_id',auth()->id())->orderBy('id','desc')->get();
        //dd($data);
        //$request->session()->flash('status','Task was successful!');
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
        //$post = Post::create($validated + ['user_id'=>auth()->id()]);
        $post = Post::create($validated + ['user_id'=>Auth::user()->id]);
        
        //dd($post);
        event(new PostCreatedEvent($post));
        //Mail::to('hsulei@gmail.com')->send(new PostStored($post));
        //Mail::to('hsulei@gmail.com')->send(new PostCreated());

        return redirect('/posts')->with('status',config('aprogrammer.message.created'));
/*         Post:: create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category,
        ]); */
        //return redirect('/posts');
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
/*         if($post->user_id != auth()->id()){
            abort(403);
        } */
        $this->authorize('view',$post);
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
/*         if($post->user_id != auth()->id()){
            abort(403);
        } */
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
