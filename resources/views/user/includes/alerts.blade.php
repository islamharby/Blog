@if(session()->exists('errors'))
<div class="card-panel #ffcdd2 red lighten-4 " >
    @foreach(session()->get('errors', []) as $k => $v)
        @foreach($v as $x => $y)
        <p>{{ $k }} : {{ $y }}</p>
        @endforeach
    @endforeach
</div>    
@endif

@if(session()->exists('error'))
<div class="card-panel #ffcdd2 red lighten-4">
	{{ session()->get('error') }}
</div>    
@endif

@if(session()->exists('success'))
<div class="card-panel teal lighten-2">
	{{ session()->get('success') }}
</div>    
@endif

