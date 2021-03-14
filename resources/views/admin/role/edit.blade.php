@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editor de Texto - Regras
        <small>Edite ou insira seus textos rapidamente</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/role">Regra</a></li>
        <li class="active">Editar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Regras</h3>
            </div>
            <!-- /.box-header -->
           @include('includes.message')
            <!-- form start -->
              <form role="form" action="{{route ('role.update',$role->id)}}" method="post">
               {{ csrf_field()}}
               {{ method_field('PATCH')}}
            <div class="box-body">
            <div class="col-lg-offset-3 col-lg-6">
                  <div class="form-group">
                  <label for="name">Nome da Regra:</label>
                  <input type="text" class="form-control" id="name" name="name" 
                  value="{{$role->name}}"
                   >
                </div>
                    <!-- Tipo de Permissoes -->
              <div class="row">
                <div class="col-lg-4">
                <label for="name">Permissão para Posts</label>
               
               @foreach($permissions as $permission)

                  @if($permission->para =='Post')
                  <div class="checkbox">
                   <label><input type="checkbox" name="permissao[]" value="{{$permission->id}}" 
                      @foreach ($role->permissions as $role_permit)
                      @if($role_permit->id == $permission->id)
                          checked
                      @endif
              
                      @endforeach

                   >{{$permission->name}}</label>
                   </div> 
                  @endif
               @endforeach             
              </div>
               <div class="col-lg-4">
                <label for="name">Permissão para Utilizadores</label>
                  @foreach($permissions as $permission)

                  @if($permission->para =='Utilizador')
                  <div class="checkbox">
                   <label><input type="checkbox" value="{{$permission->id}}" name="permissao[]" 
                    @foreach ($role->permissions as $role_permit)
                      @if($role_permit->id == $permission->id)
                          checked
                      @endif
              
                      @endforeach
                      >{{$permission->name}}</label>
                   </div> 
                  @endif
               @endforeach 
               
              </div> 
                <div class="col-lg-4">
                <label for="name">Outras Permissões</label>
                  @foreach($permissions as $permission)

                  @if($permission->para =='Outro')
                  <div class="checkbox">
                   <label><input type="checkbox" value="{{$permission->id}}" name="permissao[]" 
                    @foreach ($role->permissions as $role_permit)
                      @if($role_permit->id == $permission->id)
                          checked
                      @endif
              
                      @endforeach
                      >{{$permission->name}}</label>
                   </div> 
                  @endif
               @endforeach 
               
              </div> 

              </div>
              <!-- fim de tipo de permissoes -->
                  <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('role.index')}}" class="btn btn-warning">Voltar</a>
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