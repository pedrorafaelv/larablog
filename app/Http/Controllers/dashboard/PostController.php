<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Post;
use App\Models\Category;
use App\Models\Postimage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','rol.admin']);
    }
    
    public function index()
    {
         $posts = Post::orderBy('created_at', 'desc')->paginate(4);
        //  dd($posts);
        return view('dashboard.post.index', ['posts'=>$posts]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id','title');

       return view('dashboard.post.create', ['post' =>new Post(), 'categories'=> $categories]);  
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        // dd($request->all());
        // dd($request->validated());
        // return 'Hola mundo';
        // $request->validate([
        // 'title'=> 'required|min:5|max:500',
        // 'content'=> 'required|min:5|'
        //  ]);

            Post::create($request->validated());
             return back()->with('status', 'Post creado satisfactoriamente ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    //    $post = Post::find($id);
    //    $post = Post::findOrFail($id);

    //    dd($post);
    // if (isset($post)){
        return view('dashboard.post.show', ['post'=>$post]);
    // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id','title');
        // dd($categories);
        return view('dashboard.post.edit', ['post'=>$post, 'categories'=> $categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request, Post $post)
    {
        $post->update($request->validated());
        return back()->with('status', 'Post actualizado satisfactoriamente ');
    }

    public function image(request $request, Post $post)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png,jpg|max:10240'
        ]);
        $filename= time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $filename);

        Postimage::create(['image'=>$filename, 'post_id'=> $post->id]);
        return back ()->with('status', 'Im??gen creada con ??xito ');

        //echo 'se guard?? la ikmagen con el nombre: '.$filename;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('status', 'Post eliminado con ??xito ');

        // echo 'estamos en el metodo destroy';
    }
}
