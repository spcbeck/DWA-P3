@extends('layout.master')

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="panel panel-default">
	<div class="panel-heading">
		FuzzBeed Writer Maker
	</div>
	<div class="panel-body">
		<form method="GET" action="/writers/create">
		{{ csrf_field() }}
			<div class="form-group">
				<label>Include:</label>
				<div class="btn-group" data-toggle="buttons">
    				<label class="btn btn-default @if(!empty($locationChecked)) active @endif">
    					<input type="checkbox" name="location" @if(!empty($locationChecked)) checked=checked @endif> Location
    				</label>
    				<label class="btn btn-default @if(!empty($departmentChecked)) active @endif">
    					<input type="checkbox" name="department" @if(!empty($departmentChecked)) checked=checked @endif> Department
    				</label>
    			</div>
			</div>
			<div class="form-group">
    			<label># of Writer</label>
    			<input type="number" name="writerAmount" id="writerAmount" value="@if (!empty($writerAmount)) {{ $writerAmount }} @endif"/>
    		</div>
			<button class="btn btn-primary" type="submit">Generate Writer</button>
		</form>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		FuzzBeed Article Maker
	</div>
	<div class="panel-body">
		<form method="GET" action="/articles/create">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Type:</label>
				<div class="btn-group" data-toggle="buttons">
    				<label class="btn btn-default @if($type == "listicle") active @endif">
    					<input type="radio" name="type" value="listicle" @if($type == "listicle") checked=checked @endif /> Listicle
    				</label>
    				<label class="btn btn-default @if($type == "longform") active @endif">
    					<input type="radio" name="type" value="longform" @if($type == "longform") checked=checked @endif> Long Form 
    				</label>
    			</div>
    		</div>
    		<div class="form-group">
    			<label># of Paragraphs/List Items</label>
    			<input type="number" name="amount" id="amount" value="@if (!empty($paragraphAmount)) {{ $paragraphAmount }} @endif"/>
    		</div>
    		<button class="btn btn-primary" type="submit">Make Article</button>
		</form>
	</div>
</div>
@stop