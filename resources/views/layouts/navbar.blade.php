<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Language Switcher Buttons (Moved to the Left) -->
  <ul class="navbar-nav">
    <li class="nav-item d-none d-sm-inline-block">
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
    </li>
  </ul>

  <!-- Right-aligned Logout Button -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <form action="{{ route('logout') }}" method="post" class="nav-link">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm">
          <i class="nav-icon fas fa-sign-out-alt"></i> {{__('lang.logout')}}
        </button>
      </form>
    </li>
  </ul>
</nav>
