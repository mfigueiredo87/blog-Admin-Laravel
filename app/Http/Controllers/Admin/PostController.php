<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;
use App\Model\user\category;
use App\Model\user\tag;

class PostController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tags = tag::all();
        $categories = category::all();
        $post = post::all();
         return view('admin.post.index',compact('post','tags','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $tags = tag::all();
        $categories = category::all();
        return view('admin.post.post',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
            // 'image'=>'required',
            ]);

          //tratando a imagem, sem se preocupar com o nome do arquivo
         if ($request->hasFile('image')) {
             $imageName = $request->image->store('public/imagens');
         }
         
        $post = new post;
        $post->image=$imageName;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
         //visibilidade da caixa de verificacao
        if(isset($request->status)){
            $post->status = 1;
        }
        else{
            $post->status = 0;
        }
        // $post->status = $request->status;
       
        
        $post->save();
        //salvando pelos relacionamentos depois de salvar o post
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        return redirect(route('post.index'));
        //return $request->all();
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
        $tags = tag::all();
        $categories = category::all();
        $post = post::with('tags','categories')->where('id',$id)->first();
        return view('admin.post.edit',compact('post','tags','categories'));
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
        //return $request->all();
         $this->validate($request, [
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
            'image'=>'required',
            ]);
         //tratando a imagem, sem se preocupar com o nome do arquivo
         if ($request->hasFile('image')) {
             $imageName = $request->image->store('public/imagens');
         }

        $post = post::find($id);
        $post ->image=$imageName;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
           //verificando o valor para o status ou seja a caixa de verificacao
        if(isset($request->status)){
            $post->status = 1;
        }
        else{
            $post->status = 0;
        }
        //salvando pelos relacionamentos
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        $post->save();
        return redirect(route('post.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         post::where('id', $id)->delete();
        return redirect()->back();
    }
}
