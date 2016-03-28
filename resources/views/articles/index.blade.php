@extends('layout.master')

@section('articleDisplay')
<div class="panel panel-default">
	<div class="panel-body">
		<h2>
			@if(!empty($header))
				{{ $header }}
			@endif

			@if(empty($header))
				FuzzBeed needs content! Can you help us out? 
			@endif
		</h2>
		@if(!empty($article))
			@foreach ($article as $paragraph)
			    <p>{{ $paragraph }}.</p>
			@endforeach
		@endif
		@if(!empty($listicle))
			<ul>
			@foreach ($listicle as $listitem)
			    <li>{{ $listitem }}.</li>
			@endforeach
			</ul>
		@endif
	</div>
</div>
@stop