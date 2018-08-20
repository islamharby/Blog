  
@include('user.includes.header')
@include('user.includes.nav')


  <div class="row">
    <div class="col s12 m4 offset-m4">
        @include('user.includes.alerts')
    </div>
    <form class="col s12 m3 offset-m4" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" name="firstName" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" name="lastName" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="jobName" name="jobTitle" type="text" class="validate">
          <label for="jobName">Job Title</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="file-field input-field">
        <div class="btn">
          <span>File</span>
          <input name="img" type="file">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <p>
            <label>
              <input name="gender" type="radio" value="male" id="male" />
              <span id="male">Male</span>
            </label>
            <label>
              <input type="radio" id="female" name="gender" value="female"  />
              <span id="female" >Female</span>
            </label>
          </p>
        </div>

      </div>
      <button class="waves-effect waves-light btn">SignUp</button>
    </form>
  </div>