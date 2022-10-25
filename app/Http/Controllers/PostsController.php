<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // public function index()
   // {
       // return view("blog.index");
    //}

    public function index()
    {
        // Display all posts
        $posts= Post::all();
        return view('blog.index', compact('posts'));
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("blog.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // Validate  Inputs

        $request->validate([

       'title' => "required",
       'imagep' => 'required|image|mimes:jpg,png,jpeg|max:2048|',
       'body' => "required"


   ]);
 // Request for Inputs
        $title = $request->input('title');
        $slug = Str::slug($title,'-');
        $body = $request->input('body');

        //Image Upload
        $imagePath = 'storage/' . $request->file('imagep')->store('postImages','public');

   //Post and Save Inputs

   $post = new Post();
   $post->title = $title;
   $post->slug = $slug;
   $post->body = $body;
   $post->imagePath = $imagePath;
   $post->save();

   return redirect()->back()->with('status', 'Blog Post Successfully Saved');
















         //$request->validate([
            // 'title'=>'required'

       //]);

       //dd('Validation Passed. You can now request the Input');





















   // $allEntries = $request->all();
    //dd($allEntries);

     //$title  =  $request->input('title');
     // dd($title);
































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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
