    <nav>
		<div class="nav-wrapper">
		<a href="{{asset('admin/panel')}}" class="brand-logo" style="    width: 51px;
    margin: 3px 33px;position: initial;"><div>
			<img src="{{asset('images/ico-social-blog.png')}}" style="width: 100%;">
		</div></a>
		<ul class="right ">
			<li><a href="{{asset('admin/panel')}}">Home</a></li>
			<li class="tab col s3 "><a class="active" href="{{asset('admin/users')}}">Users</a></li>
			<li class="tab col s3"><a class="active" href="{{asset('admin/posts')}}">Posts</a></li>
			<li class="tab col s3"><a class="active" href="{{asset('admin/settings-page')}}">Settings-Page</a></li>
			<li><a href="/logout">Log Out</a></li>
		</ul>
	</nav>