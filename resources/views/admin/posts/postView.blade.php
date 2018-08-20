@include('user.includes.header')
@include('admin.includes.nav')

<div class="row">
		<div class="col s12 content" >
			<div class="row">		
				<div class="col s12 m9">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">Title : {{$posts->title}}</span>
							<span style="color:#fff;">Created at : {{$posts->created_at}}</span>	
							<hr>														
							<p>Post By : 
								{{$posts->user->firstName .' '. $posts->user->lasttName }}
							</p>
							<hr>
							<p>Body : 
							{!! $posts->body!!}
							</p>
							</div>
							@if(Auth::user())
							<div class="card-action">
							<a class="waves-effect waves-light #ef5350 red lighten-1 btn" href="{{asset("admin/post-remove/".$posts->id)}}">Remove</a>
							<a class="waves-effect waves-light btn" href="{{ asset("admin/post-view-edit/".$posts->id)}}">Edit</a>
						</div>
						    @endif
					</div>
				</div>
			</div>
		</div>
	</div>
