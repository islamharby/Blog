
@include('user.includes.header')
@include('user.includes.nav')
	<div class="row">
		<div class="col s12 content" >
			<div class="row">		
				<div class="col s12 m9">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">Title : {{$posts->title}}</span>
							<span style="color:#fff;">Created at : {{$posts->created_at}}</span>	
							<br>														
							<span style="color:#fff;">
								Post By:{{$posts->user->firstName.' '.$posts->user->lastName}}
							</span >
							<p>Body : 
							{!! $posts->body!!}
							</p>
							</div>
							@if(Auth::user())
							<div class="card-action">
							<a class="waves-effect waves-light #ef5350 red lighten-1 btn" href="{{asset("user/post-delet-view/".$posts->id)}}">Remove</a>
							<a class="waves-effect waves-light btn" href="{{ asset("user/post-edit-view/".$posts->id)}}">Edit</a>
						</div>
						    @endif
					</div>
				</div>
			</div>
		</div>
	</div>
