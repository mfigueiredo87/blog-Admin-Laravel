@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registar Utilizador
        <small>Edite ou insira seus textos rapidamente</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/user">Utilizador</a></li>
        <li class="active">Novo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
           @include('includes.message')
            <!-- form start -->
              <form role="form" action="{{route ('user.store')}}" method="post">
               {{ csrf_field()}}
            <div class="box-body">
            <div class="col-lg-offset-3 col-lg-6">
            	    <div class="form-group">
                  <label for="name">Nome de Utilizador</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do utilizador" value="{{old('name')}}">
                </div>
           		
           	    <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" id="slug" name="email" placeholder="Digite o e-mail" value="{{old('email')}}">
                </div>

                  <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="slug" name="password" placeholder="Digite a password" value="{{old('password')}}">
                </div>

                  <div class="form-group">
                  <label for="password_confirmation">Confirmar Password</label>
                  <input type="password" class="form-control" id="slug" name="password_confirmation" placeholder="Confirme a password">
                </div>

                  <div class="form-group">
                  <label for="Telem??vel">Telem??vel</label>
                  <input type="text" class="form-control" id="slug" name="phone" placeholder="Digite um numero de Telem??vel" maxlength="12" value="{{old('phone')}}">
                </div> 

                  <div class="form-group">
                  <label for="Telem??vel">Selecione a caixa de verifica????o para activar o Utilizador</label>
                    <div class="checkbox">
                         <label><input type="checkbox" name="status" @if(old('status') == 1) checked @endif value="1">Estado</label>
                </div>
                </div> 
               


                 <div class="form-group">
                  <label for="permissoes">Escolha as Permiss??es para este Utilizador</label>
                </div>


                <div class="form-group col-lg-12">
                  
                  @foreach($roles as $role)
                      <div class="col-lg-3">
                        <div class="checkbox">
                         <label><input type="checkbox" name="role[]" value="{{$role->id}}">{{$role->name}}</label>
                       </div>
                  </div>
                  @endforeach

                
               
                
                </div>

                  <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('user.index')}}" class="btn btn-warning">Voltar</a>
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