@include('user.includes.header')
@include('admin.includes.nav')

  <div class="row">
    <div  class="col s6 " >
        <h5> Select your favorite color:</h5>
        <div class="col s12 m4 offset-m4">
           @include('user.includes.alerts')
        </div>
        <form class="col s12" method="POST">
        {{ csrf_field() }}

        @foreach($settings as $setting)
        <div class="row">
            <div class="input-field col s3 ">
                <label style="margin-top: 11px;">{{$setting->title}}</label>
                <input type="{{$setting->type}}" name="data[{{$setting->name}}]" value="{{$setting->value}}" class="validate">
            </div>
        </div>
         @endforeach
        <button class="waves-effect waves-light btn" type="submit">Update</button>
        </form>
  </div>
</div>
  