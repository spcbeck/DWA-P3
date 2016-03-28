@extends('layout.master')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		FuzzBeed Writer Writer Maker
	</div>
	<div class="panel-body">
		<form method="POST" action="/writers/create">
		{{ csrf_field() }}
			<div class="form-group">
				<label>Include:</label>
				<div class="btn-group" data-toggle="buttons">
    				<label class="btn btn-default">
    					<input type="checkbox" name="bio"> Twitter Bio
    				</label>
    				<label class="btn btn-default">
    					<input type="checkbox" name="location"> Location
    				</label>
    				<label class="btn btn-default">
    					<input type="checkbox" name="department"> Department
    				</label>
    			</div>
			</div>
			<button class="btn btn-primary" type="submit">Generate Writer</button>
		</form>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		FuzzBeed List and Article Maker
	</div>
	<div class="panel-body">
		<form method="POST" action="/articles/create">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Type:</label>
				<div class="btn-group" data-toggle="buttons">
    				<label class="btn btn-default">
    					<input type="radio" name="listicle" required> Listicle
    				</label>
    				<label class="btn btn-default">
    					<input type="radio" name="longform"> Long Form
    				</label>
    			</div>
    		</div>
    		<div class="form-group">
    			<label># of Paragraphs/List Items</label>
    			<input type-"number" name="paragraphAmount" required id="paragraphAmount"/>
    		</div>
    		<button class="btn btn-primary" type="submit">Make Article</button>
		</form>
	</div>
</div>
@stop