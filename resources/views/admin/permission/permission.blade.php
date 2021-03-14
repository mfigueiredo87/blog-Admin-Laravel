@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editor de Texto - Permissão
        <small>Edite ou insira seus textos rapidamente</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.home')}}">Permissão</a></li>
        <li class="active">Nova Permissão</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Permissão</h3>
            </div>
            <!-- /.box-header -->
           @include('includes.message')
            <!-- form start -->
              <form role="form" action="{{route ('permission.store')}}" method="post">
               {{ csrf_field()}}
            <div class="box-body">
            <div class="col-lg-offset-3 col-lg-6">
            	    <div class="form-group">
                 
                  <label for="name">Nome da Permissão</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome da permissão">
                </div>
           		
           	    <div class="form-group">
                  <label class="para">Permissão Para</label>
                  <select name="para" id="para" class="form-control">
                    <option selected disabled>Seleccione a permissão</option>
                    <option value="Utilizador">Utilizador</option>
                    <option value="Post">Post</option>
                    <option value="Outro">Outro</option>
                  </select>
                </div>

                  <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('permission.index')}}" class="btn btn-warning">Voltar</a>
              </div>
            
            </div>
 		</form>
                </div>
       
            
          </div>
        
        </div>
        
      </div>
       
    </section>
    <!-- /.content -->
  </div>

@endsection