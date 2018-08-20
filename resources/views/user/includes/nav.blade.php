<nav>
    <div class="nav-wrapper">
      <a class="brand-logo" style="width: 46px; margin: 6px 37px;
        position: initial;"><div>
      	<img src="{{asset('images/ico-social-blog.png')}}" style="width: 100%;">
      </div></a>

      <ul class="right ">
         @if(Auth::guest())
        <li><a href="/login">Log In</a></li>
        <li><a href="/signup">Sign Up</a></li>
         @else
          @if(Auth::user()->role=='user')
          <li><a href="{{asset('user/home')}}">Home</a></li>
          @else
          <li><a href="{{asset('admin/panel')}}">Home</a></li>
          @endif
        <li><a href="/logout">Log Out</a></li>
        @endif
      </ul>
  </nav>
