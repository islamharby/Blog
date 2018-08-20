@include('user.includes.header')
@include('admin.includes.nav')

<div class="row">
  <div class="col s12"> 
    <div class="row">
			<div class="col s3 "> 
			<a id="scale-demo" href="{{asset('admin/posts-add')}}"  class="btn-floating btn-large scale-transition" style="margin-top: 10px;margin-left: 10px;">
				<i class="material-icons">add</i>
			</a>
      </div>
          <form class="col s3" >
            <div class="row">
              <div class="input-field col s11">
              <input id="search" type="text" name="q" value="{{ request()->q }}" class="validate">
              <label id="search">search</label>
              </div>
                    <div class="input-field col s1">        
                <button class="waves-effect waves-light btn">Search</button>
              </div>        
            </div>
          </form>
		</div>
  </div>
       @if (count($posts))
          {{ $posts->links() }}
        @endif
	<div class="col s12">
		<table>
        <thead>
          <tr>
              <th class="col s1">ID</th>
              <th class="col s2">Title</th>
              <th class="col s6">Body</th>
              <th class="col s1">User Id</th>
              <th class="col s2">Action</th>
          </tr>
        </thead>

        <tbody>
        @foreach ($posts as $post)
          <tr>
              <td class="col s1" style="margin-top: 21px;">{{ $post->id }}</td>
              <td class="col s2" style="margin-top: 21px;">{{ $post->title }}</td>
              <td  class="col s6">{!! $post->body !!}</td> 
              <td class="col s1" style="margin-top: 21px;">{{ $post->user->firstName.' '.$post->user->lastName }}</td>
              <td class="col s2" style="margin-top: 21px;">
              <a class="waves-effect waves-light #ef5350 red lighten-1 btn" href="{{asset("admin/posts-remove/".$post->id)}}">Remove</a>
              <a class="waves-effect waves-light btn" href="{{asset("admin/posts-edit/".$post->id)}}">Edit</a>
              </td> 
          </tr>
        @endforeach 
        </tbody>
      </table>
	</div>
</div>