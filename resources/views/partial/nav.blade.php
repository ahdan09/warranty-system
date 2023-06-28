  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @auth
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Back to Landing-page</a>
      </li>
      @endauth
    </ul>

    <ul class="navbar-nav ml-auto">
      @auth
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();"><i style="color:#5f4dee;" class="fa-solid fa-right-from-bracket"></i><b style="margin-left: 8px; color:#5f4dee;">Logout</b>
           
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          @csrf
        </form>
      </li>
      @endauth
    </ul>    

    @guest
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="/login"><i style="color:#5f4dee;" class="fa-solid fa-right-to-bracket"></i><b style="margin-left: 8px; color:#5f4dee;">Login</b></a>
      </li>
    </ul>
    @endguest
    
  </nav>
  <!-- /.navbar -->
