<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1">{{__('lang.app_name')}}</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">{{__('lang.pages.login.sign_in_text')}}</p>

      <form action="{{ route('login') }}" method="post">
      @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="{{__('lang.pages.login.email')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="{{__('lang.pages.login.password')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">{{__('lang.pages.login.sign_in_button')}}</button>
          </div>
          <!-- /.col -->
        </div>


        @if($errors->has('login'))
          <p>{{ $errors->first('login') }}</p>
        @endif
      </form>

      <form action="{{ route('language.switch') }}" method="POST" class="nav-link">
        @csrf

        <!-- English Button -->
        <button type="submit" name="locale" value="en" class="btn btn-link text-{{ app()->getLocale() !== 'en' ? 'dark' : 'primary' }}">
          English
        </button>

        <!-- Japanese Button -->
        <button type="submit" name="locale" value="ja" class="btn btn-link text-{{ app()->getLocale() !== 'ja' ? 'dark' : 'primary' }}">
          日本語 (Japanese)
        </button>
      </form>

      <!-- /.social-auth-links -->


    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- jQuery -->
<script src="{{mix('js/all.js')}}"></script>
<script src="{{mix('js/app.js')}}"></script>
@yield('custom-scripts')

</body>
</html>



{{--<form action="{{ route('login') }}" method="post">--}}
{{--  @csrf--}}

{{--  <label for="email">Email:</label>--}}
{{--  <input type="email" name="email" required>--}}

{{--  <label for="password">Password:</label>--}}
{{--  <input type="password" name="password" required>--}}

{{--  <button type="submit">Login</button>--}}
{{--</form>--}}

{{--@if($errors->has('login'))--}}
{{--  <p>{{ $errors->first('login') }}</p>--}}
{{--@endif--}}
