<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title') | Management | Molla Shop</title>
  {{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/icons/favicon-32x32.png') }}" /> --}}
  {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/icons/favicon-16x16.png') }}" /> --}}
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/plugins/ckeditor5/ckeditor5.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/plugins/dropzone/dropzone.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />
  @yield('Styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('admin/images/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
        width="60" />
    </div>

    @include('admin.layouts.partials.header')

    @include('admin.layouts.partials.sidebar')

    <div class="content-wrapper pb-4">
      @yield('main')
    </div>

    @include('admin.layouts.partials.footer')
  </div>

  <!-- jQuery -->
  <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Dropzone -->
  <script src="{{ asset('admin/plugins/dropzone/dropzone.min.js') }}"></script>
  <!-- bs-custom-file-input -->
  <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
  <!-- Select2 -->
  <script src="{{ asset('admin/plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/select2/js/i18n/vi.js') }}"></script>
  <!-- Validate -->
  <script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <!-- Sweetalert2 -->
  <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <!-- DataTables & Plugins -->
  <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Inputmask -->
  <script src="{{ asset('admin/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
  <!-- Theme Script -->
  <script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
  <script src="{{ asset('admin/js/main.js') }}"></script>
  @yield('Scripts')
</body>

</html>
