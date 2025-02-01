<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>@yield('title')</title>
  <meta name="keywords" content="HTML5 Template" />
  <meta name="description" content="Molla - Bootstrap eCommerce Template" />
  <meta name="author" content="p-themes" />
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('shop/images/icons/apple-touch-icon.png') }}" />
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('shop/images/icons/favicon-32x32.png') }}" />
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('shop/images/icons/favicon-16x16.png') }}" />
  <link rel="manifest" href="{{ asset('shop/images/icons/site.html') }}" />
  <link rel="mask-icon" href="{{ asset('shop/images/icons/safari-pinned-tab.svg') }}" color="#666666" />
  <link rel="shortcut icon" href="{{ asset('shop/images/icons/favicon.ico') }}" />
  <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}" />
  <meta name="application-name" content="{{ config('app.name') }}" />
  <meta name="msapplication-TileColor" content="#cc9966" />
  <meta name="msapplication-config" content="{{ asset('shop/images/icons/browserconfig.xml') }}" />
  <meta name="theme-color" content="#ffffff" />
  <link rel="stylesheet" href="{{ asset('shop/plugins/line-awesome/css/line-awesome.min.css') }}" />
  <!-- Plugins CSS File -->
  <link rel="stylesheet" href="{{ asset('shop/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('shop/css/plugins/owl-carousel/owl.carousel.css') }}" />
  <link rel="stylesheet" href="{{ asset('shop/css/plugins/magnific-popup/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('shop/css/plugins/jquery.countdown.css') }}">
  <!-- Main CSS File -->
  <link rel="stylesheet" href="{{ asset('shop/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('shop/css/skin.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('shop/css/custom.css') }}" />
  @yield('Styles')
</head>

<body>
  <div class="page-wrapper">
    @include('shop.layouts.partials.header')

    <main class="main">
      @yield('main')
    </main>

    @include('shop.layouts.partials.footer')
  </div>

  <button id="scroll-top" title="Back to Top">
    <i class="icon-arrow-up"></i>
  </button>

  <!-- Mobile Menu -->
  <div class="mobile-menu-overlay"></div>

  <!-- Plugins JS File -->
  <script src="{{ asset('shop/js/jquery.min.js') }}"></script>
  <script src="{{ asset('shop/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('shop/js/jquery.hoverIntent.min.js') }}"></script>
  <script src="{{ asset('shop/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('shop/js/superfish.min.js') }}"></script>
  <script src="{{ asset('shop/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('shop/js/bootstrap-input-spinner.js') }}"></script>
  <script src="{{ asset('shop/js/jquery.plugin.min.js') }}"></script>
  <script src="{{ asset('shop/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('shop/js/jquery.countdown.min.js') }}"></script>
  <!-- Main JS File -->
  <script src="{{ asset('shop/js/main.js') }}"></script>
  @yield('Scripts')
</body>

</html>
