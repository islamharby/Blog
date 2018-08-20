@include('user.includes.header')
@include('user.includes.nav')
@if(Auth::user())

	<div class="row">
		<div class="col s9 content" >
			  	<div class="row">
					<div class="col s3 ">
					
					<a id="scale-demo" href="{{asset('user/post-page')}}" class="btn-floating btn-large scale-transition" style="margin-top: 10px;margin-left: 10px;">
						<i class="material-icons">add</i>
					</a>
					
					</div>
		          <form class="col s5">
		            <div class="row">
		              <div class="input-field col s10">
						<input id="search" type="text" name="q" value="{{ request()->q }}" class="validate">
						<label id="search">search</label>
					  </div>
		              <div class="input-field col s1">			  
						  <button class="waves-effect waves-light btn">Search</button>
					  </div>			  
		            </div>
		          </form>
				</div>
			<div class="row">
				@if (count($posts))
				  {{ $posts->links() }}
				@endif		
				@foreach ($posts as $post)
				<div class="col s12 m6">
					<div class="card blue-grey darken-1 ">
						<div class="card-content white-text">
							<span class="card-title">Title : {{$post->title}}</span>
							<span>Created at : {{$post->created_at}}</span>	
							<br>																							
							<span>Post By : {{$post->user->firstName .  ' '.$post->user->lastName}}</span>
							<p>Body : 
							{{ str_limit(strip_tags($post->body),100) }}
							@if (strlen(strip_tags($post->body)) >100)
							... <a href="{{asset("user/post-view/".$post->id)}}" >Read More</a>
							@endif
							</p>
							</div>
							@if(Auth::user())
							<div class="card-action">
							<a class="waves-effect waves-light #ef5350 red lighten-1 btn" href="{{asset("user/post-delet/".$post->id)}}">Remove</a>
							<a class="waves-effect waves-light btn" href="{{asset("user/post-edit/".$post->id)}}">Edit</a>
						</div>
						@endif
					</div>
				</div>
				@endforeach 

			
			</div>
		</div>
		<div class="col s3  profile">

			<div class="row">
				<div class="col s12 image">
               	<dd>
                   <img src="{{Auth::user()->img}}"  alt="profile" style="width: 110px;height: 110px; border-radius: 50%">
                    <span>
                            <a class="pull-right" href="#">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </span>
                </dd>
                <hr>
				</div>
				<div class="col s12 name">
               	<dt><strong>Your name </strong></dt>
               	<dd>
                   		{{ Auth::user()->firstName.' '. Auth::user()->lastName }}
                    <span>
                            <a class="pull-right" href="#">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </span>
                </dd>
                <hr>
				</div>
				<div class="col s12 jobTitle">
					<dt><strong>Your Job Title </strong></dt>
	               	<dd>
	                   		{{ Auth::user()->jobTitle  }}
	                    <span>
	                            <a class="pull-right" href="#">
	                            <i class="fa fa-pencil"></i>
	                        </a>
	                    </span>
	                </dd>
                	<hr>
				</div>
				<div class="col s12 email">
					<dt><strong>Your Email </strong></dt>
	               	<dd>
	                   		{{ Auth::user()->email }}
	                    <span>
	                            <a class="pull-right" href="#">
	                            <i class="fa fa-pencil"></i>
	                        </a>
	                    </span>
	                </dd>
	                <hr>
				</div>

				<div class="col s12 gender">
					<dt><strong>Your Gander </strong></dt>
	               	<dd>
	                   		{{ Auth::user()->gender }}
	                    <span>
	                            <a class="pull-right" href="#">
	                            <i class="fa fa-pencil"></i>
	                        </a>
	                    </span>
	                </dd>
	                <hr>
				</div>
     			 <div class="col s4  offset-s4 edit">
     			 	<a class="waves-effect waves-light btn" href="{{asset("user/profile/".Auth::user()->id)}}" >Edit</a>
     			 </div>
			</div>
		</div>
@endif
	</div>