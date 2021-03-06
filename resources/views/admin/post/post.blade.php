@extends('admin.layouts.app')
@section('headSection')
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
<!-- <link rel="stylesheet" type="text/css" href="{{asset('admin/contents.css')}}"> -->
@endsection
@section('main-content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editor de Texto
        <small>Edite ou insira seus textos rapidamente</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/post">Post</a></li>
        <li class="active">Editor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">POSTs</h3>
            </div>
            <!-- /.box-header -->
            <!-- tratamento dos erros -->
         @include('includes.message')
            <!-- form start -->
            <form role="form" action="{{route ('post.store')}}" method="post" enctype="multipart/form-data">
            
              {{ csrf_field()}}
              <div class="box-body">
            <div class="col-lg-6">
            	    <div class="form-group">
                  <label for="title">Titulo do Post</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Digite o titulo">
                </div>
           		
           		<div class="form-group">
                  <label for="subtitle">Subtitulo do Post</label>
                  <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Digite o subtitulo">
                </div>

                 <div class="form-group">
                  <label for="slug">Slug (sinonimo)</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Digite o sinonimo">
                </div>
            </div>

               <div class="col-lg-6">
            <br>
                  <div class="form-group">
                  <div class="pull-right">
                    <label for="image">Carregar Imagem</label>
                    <input type="file" id="upload" name="image">
                  </div>
                
                <div class="checkbox pull-left">
                  <label>
                  <!-- verificando se a chekbox ta activa ou nao -->
                    <input type="checkbox" name="status" value="1"> Publicado
                  </label>
                  </div>
              
                </div>
                <br>
                
                    <!-- multipla seleccao -->
             <div class="form-group" style="margin-top: 18px;">
                <label>Seleccionar Tags</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Seleccionar Tags" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                  @foreach ($tags as $tag)
                  <option value="{{$tag->id}}">{{$tag->name}}</option>
                  @endforeach
                </select> 
              </div>           <!-- multipla seleccao -->
             <div class="form-group" style="margin-top: 18px;">
                <label>Seleccionar Categoria</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Seleccionar Categoria" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                   @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select> 
              </div>
                </div>
                </div>
             <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inserir Texto
                <small>R??pido e F??cil</small>
              </h3>
              
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Minimizar/Maximizar">
                  <i class="fa fa-minus"></i></button>
                 
              </div>
             </div>
            <div class="box-body pad">
                <textarea  name="body" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
            </div>
          </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('post.index')}}" class="btn btn-warning">Voltar</a>
              </div>
            </form>
          </div>
        
        </div>
        
      </div>
       
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('footerSection')
<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>
<!-- <script src="{{asset('admin/ckeditor/js/sample.js')}}"></script>
<script src="{{asset('admin/ckeditor/js/sf.js')}}"></script> -->
<!-- <script src="{{asset('admin/ckeditor.js')}}"></script>
<script src="{{asset('admin/config.js')}}"></script>
<script src="{{asset('admin/styles.js')}}"></script> -->
<!-- <script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script> -->
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script>
  $(document).ready(function(){
    $(".select2").select2();
  });
</script>
@endsection