<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Category;
use App\Post;
use Carbon\Carbon;


class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id',auth()->user()->id)->get();
        return view("backend.posts.list", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('name', 'id');
        return view("backend.posts.add", compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title',
            'resumen' => 'required',
            'content' => 'required',
        ]);

        $image = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path().'/images/', $image);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->resumen = $request->resumen;
        $post->created_at = Carbon::now();
        $post->user_id = 1;
        $post->imagen = $image;
        $post->slug= str_slug($request->title, "-");
        $post->status = 1;

        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('access', $post);
        $categories = Category::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('name', 'id');
        return view("backend.posts.edit", compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|unique:posts,title,'.$post->id,
            'resumen' => 'required',
            'content' => 'required',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->resumen = $request->resumen;
        if ($request->hasFile('image')) {
            $image = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/images/', $image);
            $post->imagen = $image; 

        }

        $post->update(); 

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }


    public function upload_image(Request $request){
        $file = $request->file('file');
        $destinationPath = public_path().'/uploads/';
        $filename = time().$file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        echo $filename;
    }
}
