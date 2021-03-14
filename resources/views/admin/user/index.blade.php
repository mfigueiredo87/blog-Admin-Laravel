@extends('admin/layouts/app')

@section('headSection')

<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bem vindo a página de Gestão de Utilizadores
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/user">Utilizadores</a></li>
        <li class="active">Gestão de Utilizadores</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
               
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        <!--   <h3 class="box-title">Title</h3> -->
             <a class=" col-lg-offset-5 btn btn-success" href="{{route('user.create')}}">Novo Utilizador</a> 
          <div class="box-tools pull-right">
             @include('includes.message')
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Utilizadores Registados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nº de Ordem</th>
                  <th>Nome de Utilizador</th>
                  <th>Permissões</th>
                  <th>E-mail</th>
                  <th>Telemóvel</th>
                  <th>Estado</th>
                  <th>Editar</th>
                  <th>Apagar</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                  <tr>
                  <td>{{$loop->index +1}}</td>
                  <td>{{$user->name}}
                  <td>@foreach ($user->roles as $role) {{$role->name}}, @endforeach</td>
                  <td>{{$user->email}}
                  <td>{{$user->phone}}
                  <td>{{$user->status ? 'Activo' :'Inactivo'}} 
                  </td>
                 
                  <td style="text-align: center;"><a href="{{route('user.edit',$user->id)}}"><i class="fa fa-edit"></i></a> </td>
                  <td style="text-align: center;">
                  <form id="delete-form-{{$user->id}}" method="post" action="{{route('user.destroy',$user->id)}}" style="display: none">
                  {{ csrf_field()}}
                  {{ method_field('DELETE')}}
                    
                  </form>
                  <a href="" onClick="
                  if(confirm('Tem certeza que deseja apagar?'))
                  {
                  event.preventDefault();
                  document.getElementById('delete-form-{{$user->id}}').submit();
                  }
                  else{
                  event.preventDefault();}">
                  <i class="fa fa-trash"></i></a></td>
              
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>Nº de Ordem</th>
                  <th>Nome de Utilizador</th>
                  <th>Permissões</th>
                  <th>E-mail</th>
                  <th>Telemóvel</th>
                  <th>Estado</th>
                  <th>Editar</th>
                  <th>Apagar</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Gestão de Utilizadores
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection

@section('footerSection')

<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function (){

    $("#example1").DataTable();
    $("#example2").DataTable({
      "paging":true,
      "lengthChange":false,
      "searching":false,
      "ordering":true,
      "info":true,
      "autoWidth":false
    });

  });
</script>
@endsection