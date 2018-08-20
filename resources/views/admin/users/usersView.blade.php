@include('user.includes.header')
@include('admin.includes.nav')


<div class="row">
<div class="col s12">
  <div class="row">
			<div class="col s3 ">
			<a id="scale-demo" href="{{asset('admin/users-add')}}" class="btn-floating btn-large scale-transition" style="margin-top: 10px;margin-left: 10px;">
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
          @if (count($users))
          {{ $users->links() }}
        @endif
	<div class="col s12">
		<table>
        <thead>
          <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Job Title</th>
              <th>Gender</th>
              <th>Image</th>
              <th>State</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
        @foreach ($users as $user)
          <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->firstName }}</td>
              <td>{{ $user->lastName }}</td> 
              <td>{{ $user->email }}</td>
              <td>{{ $user->jobTitle }}</td> 
              <td>{{ $user->gender }}</td> 
              <td><img src="{{ $user->img }}" style="width: 30px;height: 30px;border-radius: 50%;"></td> 
              <td>{{ $user->role }}</td> 
              <td>
              <a class="waves-effect waves-light #ef5350 red lighten-1 btn" href="{{asset("admin/users-remove/".$user->id)}}">Remove</a>
              <a class="waves-effect waves-light btn" href="{{asset("admin/users-edit/".$user->id) }}">Edit</a>
              </td> 
          </tr>
        @endforeach 
        </tbody>
      </table>
	</div>
</div>