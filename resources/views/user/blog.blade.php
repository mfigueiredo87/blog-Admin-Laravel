@extends('user/app')
<!-- include para imagens usando yield -->
@section('bg-img', Storage::disk('local')->($post->image))
<!-- titulo e subtitulo do blog -->
@section('title','MF Blog')

@section('sub-heading','Aprendendo Sobre Blog Admin')

 @section('main-content')
  <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @foreach($posts as $post)
                <div class="post-preview">
                    <a href="{{route('post',$post->slug)}}">
                        <h3 class="post-title">
                            {{$post->title}}
                        </h3>
                        <h3 class="post-subtitle">
                           {{$post->subtitle}}
                        </h3>
                    </a>
                    <p class="post-meta" style="margin-right: 20px;">Publicado por: <a href="#">{{$post->posted_by}}</a> {{$post->created_at->diffForHumans()}}</p>
                </div>
                @endforeach
                <hr>
                <!-- implementacao de facebook coments -->
                
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                    <!-- faz a paginacao -->
                        {{$posts->links()}}
                        <!-- <a href="#">Publicações Antigas &rarr;</a> -->
                    
                    </li>
                </ul>
            </div>
        </div>
    </div>
 @endsection