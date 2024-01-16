<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
@include('layouts.header')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.navbar')
  <!-- /.navbar -->
  <main id="app">
  <!-- Main Sidebar Container -->
    @include('layouts.sidebar')

    @yield('contents')

    @include('layouts.footer')
  </main>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{mix('js/all.js')}}"></script>
<script src="{{mix('js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@yield('custom-scripts')

</body>
</html>
