@include('user.includes.header')
@include('admin.includes.nav')


 <div class="row">
  <div class="col s3 offset-s3">
    @include('user.includes.alerts')
  </div>
    <form class="col s6 offset-s3" method="POST">
    {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <input id="title" type="text" name="title" class="validate">
          <label for="title">Title</label>
        </div>
        <div class="input-field col s12">
            <textarea name="body"></textarea>
        </div>
        <div class="input-field col s12">
            <button class="waves-effect waves-light btn">add</button>
        </div>
      </div>
    </form>
  </div>