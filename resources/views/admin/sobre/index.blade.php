@extends('admin/layouts/app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrador de Blog
        <small>Crie seus blogs com painel administrativo</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Sobre o programa</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
             
          </div>
        </div>
        <div class="box-body">
          <p>Programa desenvolvido por Manuel Figueiredo Armando Tchissuata @2018</p>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Entre em contacto comigo atraves do telefone: +244 924 58 34 05
          E-mail: man.figueiredo@hotmail.com
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection