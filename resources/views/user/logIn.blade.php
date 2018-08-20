  
@include('user.includes.header')
@include('user.includes.nav')

  <div class="row">
    <div class="col s12 m4 offset-m4">
        @include('user.includes.alerts')
    </div>
    <form class="col s12 m3 offset-m4" method="POST">
       {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" name="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" name="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <button class="waves-effect waves-light btn">LogIn</button>
    </form>
  </div>