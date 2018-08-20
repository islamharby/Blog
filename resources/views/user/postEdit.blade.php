@include('user.includes.header')
@include('user.includes.nav')


 <div class="row">
 <div class="col s3 offset-s3">
    @include('user.includes.alerts')
  </div>
    <form class="col s6 offset-s3" method="POST" >
    {{ csrf_field() }}
    
      <div class="row">
        <div class="input-field col s12">
          <input id="title" type="text" value ="{{$posts->title}}" name="title" class="validate">
          <label for="title">Title</label>
        </div>
        <div class="input-field col s12">
            <textarea name="body">{{$posts->body}}</textarea>
        </div>
        <div class="input-field col s12">
            <button class="waves-effect waves-light btn">Edit Post</button>
        </div>
      </div>
    </form>
  </div>
