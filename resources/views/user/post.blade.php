@extends('user/app')

<!-- include para imagens usando yield -->
@section('bg-img',Storage::disk('local')->url($post->image))
<!-- titulo e subtitulo do post -->
@section('title',$post->title)

@section('sub-heading',$post->subtitle)

@section('main-content')

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="text-align: justify;">
                <small>Criado a: {{$post->created_at->diffForHumans()}}</small>
               <!-- mostrando a categoria -->
                @foreach ($post->categories as $category)
                <small class="pull-right" style="margin-right: 20px;"> <i>Categoria</i>:
                        <a href="/post/category/{{$category->name}}">{{$category->name}}</a>
                 </small>    
                @endforeach
               
                <br>
                <hr>
                   <!-- o htmlspecialchars_decode serve para retirar as tags html no corpo do texto visivel no documento. -->
                   {!! htmlspecialchars_decode($post->body)!!}
 
                   <!--  <blockquote></blockquote> -->
                   <!-- Mostrar a Tag -->
                   <h4>Tag:</h4>
                    @foreach ($post->tags as $tag)
                <a href="/post/tag/{{$tag->name}}"><small class="pull-left" style="margin-right: 20px; border-radius: 5px; border:1px solid gray; padding: 5px;">
                        {{$tag->name}}
                 </small></a>    
                @endforeach
                </div>
            </div>
        </div>
    </article>

    <hr>
@endsection

