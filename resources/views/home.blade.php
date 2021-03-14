
@extends('user/app')

<!-- include para imagens usando yield -->
@section('bg-img',asset('blog/img/contact-bg.jpg'))
<!-- titulo e subtitulo do post -->
@section('title','Home')

@section('sub-heading','Seja Bem vindo ao meu Blog')

@section('main-content')

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
            bem vindo ao meu blog
            {{ Auth::user()->name }}
            </div>
        </div>
    </article>

    <hr>
@endsection
@section('footer')

@endsection



 
