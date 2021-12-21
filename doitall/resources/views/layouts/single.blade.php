<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Doitall @auth - {{ Auth::user()->name }} @endauth</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link rel="icon" type="image/png"href="/img/logo.png">
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Procurar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Doitall</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/avataruser.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          <a class=" text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Perfil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Meus dados
              </p>
            </a>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Compras
                <span class="badge badge-info right">0</span>
              </p>
            </a>
              </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Cupoms
                <span class="badge badge-info right">0</span>
              </p>
            </a>
              </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Notificações
                <span class="badge badge-info right">0</span>
              </p>
            </a>
              </li>
            <li class="nav-item ">
              <a  class="nav-link" data-bs-toggle="modal" data-bs-target="#companycreate">
              <i class="nav-icon fas fa-copy"></i>
              <p class="text-warning">
                Cadastrar minha empresa
              </p>
            </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview  ">
            <a class="nav-link bg-warning "  >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Empresa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Produtos
                <span class="badge badge-info right">0</span>
              </p>
            </a>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Funcionários
                <span class="badge badge-info right">0</span>
              </p>
            </a>
              </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Vendas
                <span class="badge badge-info right">0</span>
              </p>
            </a>
              </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pagamentos
                <span class="badge badge-info right">0</span>
              </p>
            </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link bg-danger">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Administração
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Empresas
                <span class="badge badge-info right">0</span>
              </p>
            </a>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Produtos
                <span class="badge badge-info right">0</span>
              </p>
            </a>
              </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Notificações
                <span class="badge badge-info right">0</span>
              </p>
            </a>
              </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pagamentos
                <span class="badge badge-info right">0</span>
              </p>
            </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
    @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<!-- The Modal of Company Create -->
<div class="modal bg-warning" id="companycreate">
  <div class="modal-dialog modal-xl ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cadastro de empresa</h4><br>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
      <p class="modal-title">Quem bom que você tem uma empresa. 
          Ficamos muito gratos em poder cooperar para o crescimento de seu negocio. 
          Digite abaixo alguns dados para que possamos liberar varias funcionalidades para gerenciar os processos de seu negocio.
        </p><br>
        <form method="POST" action="/companies/store">
        @csrf
       <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control">
         Nome da empresa:
         <input type="text" name="name" id="name" class="form-control">
         CNPJ:
         <input type="text" name="cnpj" id="cnpj" class="form-control">
         Telefone:
         <input type="text" name="phone" id="phone" class="form-control">
         Endereço:      
         <input type="text" name="address" id="address" class="form-control"> 
         Estado:
         <select class="form-control " id="uf" name="uf" style="color: #00a5bb" required>
	<option value="">Selecione</option>
	<option value="AC">Acre</option>
	<option value="AL" >Alagoas</option>
	<option value="AP" >Amapá</option>
	<option value="AM" >Amazonas</option>
	<option value="BA" >Bahia</option>
	<option value="CE" >Ceará</option>
	<option value="DF" >Distrito Federal</option>
	<option value="ES" >Espírito Santo</option>
	<option value="GO" >Goiás</option>
	<option value="MA" >Maranhão</option>
	<option value="MT" >Mato Grosso</option>
	<option value="MS" >Mato Grosso do Sul</option>
	<option value="MG" >Minas Gerais</option>
	<option value="PA" >Pará</option>
	<option value="PB" >Paraíba</option>
	<option value="PR" >Paraná</option>
	<option value="PE" >Pernambuco</option>
	<option value="PI" >Piauí</option>
	<option value="RJ" >Rio de Janeiro</option>
	<option value="RN" >Rio Grande do Norte</option>
	<option value="RS" >Rio Grande do Sul</option>
	<option value="RO" >Rondônia</option>
	<option value="RR" >Roraima</option>
	<option value="SC" >Santa Catarina</option>
	<option value="SP" >São Paulo</option>
	<option value="SE" >Sergipe</option>
	<option value="TO" >Tocantins</option>
</select>
         Cidade:
         <input type="text" name="city" id="city" class="form-control">
        <br> 
        <button type="subbmit" class="btn btn-primary addCompany">Cadastrar</button>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>


  <footer class="main-footer">
    <strong>Doitall </strong>
    Seu sistema que faz tudo
    <div class="float-right d-none d-sm-inline-block">
      <b>Versão</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/adminlte/plugins/moment/moment.min.js"></script>
<script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/dist/js/demo.js"></script>
<!-- Pro Modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
