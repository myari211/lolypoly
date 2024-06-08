<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.1">
  <title>{{ strtoupper((new \App\Helpers\GeneralFunction)->generalParameterValue('website_name')) }} | @yield('title')</title>
  <link rel="icon" type="image/x-icon" href="{{ strtoupper((new \App\Helpers\GeneralFunction)->generalParameterValue('logo')) }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @include('layouts.admin.css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('layouts.admin.topnav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.admin.sidebarmenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 d-flex justify-content-center">
          <div class="col-lg-11">
            <div class="row">
              {{-- <div class="col-sm-6">
                <h1 class="m-0">@yield('title')</h1>
              </div><!-- /.col --> --}}
              <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
              </div><!-- /.col -->
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="row d-flex justify-content-center">
      <div class="col-lg-11">
        @yield('content')
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://tech.feellas.id">tech.feellas.id</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

  @include('layouts.admin.script')
  
  @stack('body-scripts')
  
  <script src="{{ asset('assets/src/js/general-function.js') }}"></script>
  
</body>
</html>
