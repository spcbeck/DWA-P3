@extends('layout.master')

@section('articleDisplay')
<div class="panel panel-default">
		<ul class="list-group panel-body">
			@foreach ($writers as $writer)
			<li class="list-group-item">
				<h2>
					{{ $writer['name'] }}
					<small>
						{{ $writer['location'] }}
					</small>
				</h2>
				<h3>
					{{ $writer['department'] }}
				</h3>
			</li>
			@endforeach
		</ul>
</div>
@stop