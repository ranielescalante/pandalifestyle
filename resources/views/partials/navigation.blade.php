<link rel="stylesheet" type="text/css" href="{{asset ('css/nav.css')}}">

<nav>
    <div class="nav-wrapper">
      <a href="{{ url('/home') }}" class="brand-logo" id="brandLogo"><img src="{{asset ('img/home/Panda.png')}}"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="large material-icons">menu</i></a>
      
      <ul class="right hide-on-med-and-down">
        @if (Auth::user())

            <li>
              <a href="{{ url('/articles') }}">Articles</a>
            </li>
            
            <li>
              <a href="{{ url('/profile') }}">Your Posts</a>
            </li>

            <li>
              
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </li>

        @else
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>

        @endif

        
    </ul>
    <ul class="side-nav" id="mobile-demo">
        @if (Auth::user())

            <li>
              <a href="{{ url('/articles') }}">Articles</a>
            </li>
            
            <li>
              <a href="{{ url('/profile') }}">Your Posts</a>
            </li>

            <li>
              
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </li>

        @else
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>

        @endif
    </ul>
  </div>
</nav>

