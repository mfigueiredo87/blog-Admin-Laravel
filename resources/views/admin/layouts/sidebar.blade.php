 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin/dist/img/foto.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i>Logado</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu Principal</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Gestor Post</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('post.index')}}"><i class="fa fa-circle-o"></i>Posts</a></li>
            <li class="active">
            <a href="{{ route('category.index')}}"><i class="fa fa-circle-o"></i> Categorias </a></li>
            <li class="active"><a href="{{ route('tag.index')}}"><i class="fa fa-circle-o"></i> Tags </a></li> 
            
            
          </ul>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-user-o"></i>
            <span>Gerir Utilizadores</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="{{ route('role.index')}}"><i class="fa fa-circle-o"></i> Regras </a></li>
          <li class="active"><a href="{{ route('permission.index')}}"><i class="fa fa-circle-o"></i> Permissões </a></li>
            <li><a href="{{ route('user.index')}}"><i class="fa fa-circle-o"></i> Utilizadores</a></li>
          </ul>
        </li>
        <li>
          <a href="{{route('sobre.index')}}">
            <i class="fa fa-th"></i> <span>Sobre</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Autor</small>
            </span>
          </a>
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

