<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Gabion Dashboard</title>

  <link rel="icon" href="{{asset('images/logo/favicon.png')}}" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('front')}}" class="brand-link text-center" style="font-size: 1.35rem;">
      <span class="brand-text font-weight-bold">Bagmati Gabion Box</span>
      <br>
      <span style="font-size: 0.8rem;" class="brand-text">Content Management System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ ucfirst(Auth::user()->name) }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <router-link to="/home" class="nav-link" active-class="router-link-exact-active active">
              <i class="nav-icon fas fa-tachometer-alt text-blue"></i>
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </router-link>
          </li>

          
          <li class="nav-item has-treeview">
          	<!-- menu-open add class to open it directly -->
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog text-purple"></i>
              <p>
                Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/user" class="nav-link" active-class="active">
                  <i class="fas fa-users nav-icon"></i>
                  <p>User</p>
                </router-link>
              </li>
            </ul>
          </li>

           <li class="nav-item">
            <router-link to="/slider" class="nav-link" active-class="active">
              <i class="nav-icon fas fa-film text-green"></i>
              <p>
                Slider
              </p>
            </router-link>
          </li>

           <li class="nav-item">
            <router-link to="/team" class="nav-link" active-class="active">
            	<i class="nav-icon fas fa-users-cog text-yellow"></i>
              <p>
                Team
              </p>
            </router-link>
          </li>

           <li class="nav-item">
            <router-link to="/service" class="nav-link" active-class="active">
              <i class="nav-icon fab fa-stripe-s text-teal"></i>
              <p>
                Service
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/gallery" class="nav-link" active-class="active">
              <i class="nav-icon fas fa-images text-purple"></i>
              <p>
                Gallery Manager
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/contact" class="nav-link" active-class="active">
            	<i class="nav-icon fas fa-envelope-open text-orange"></i>
              <p>
                Contact Message
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/testimonial" class="nav-link" active-class="active">
              <i class="nav-icon fas fa-comment text-blue"></i>
              <p>
                Testimonials
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/info" class="nav-link" active-class="active">
              <i class="nav-icon fas fa-info-circle text-yellow"></i>
              <p>
                Company Info
              </p>
            </router-link>
          </li>

           <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            	<i class="nav-icon fas fa-power-off text-red"></i>
              <p>
                Logout
              </p>
              <form id="logout-form" method="post" action="{{route('logout')}}" style="display:none;">
              	@csrf
              </form>
            </a>
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
    <div class="content">
      <div class="container-fluid">

        	<router-view></router-view>

        	 <!------------ set progressbar ------------>
        	<vue-progress-bar></vue-progress-bar>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->

 

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

@auth
<script type="text/javascript">
  window.user = @json(auth()->user())
</script>
@endauth



<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>
