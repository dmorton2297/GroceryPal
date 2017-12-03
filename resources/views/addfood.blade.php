@extends('layouts.app')

@section('style')
	<style type="text/css">
		#Header{
			padding-left: 100px;
		}
	</style>
@stop


@section('content')
	<!-- Create a header for the form -->
	<h1 id="Header">Add food item</h1>

	{!! Form::open(['route' => 'food_store', 'class' => 'form']) !!}
	<div class="form-group">
		{!! Form::label('item', 'Item name: ') !!}
		{!! Form::text('item', null, ['class' => 'form-control']) !!}

		{!! Form::label('description', 'Item descirption: ') !!}
		{!! Form::text('description', null, ['class' => 'form-control']) !!}

		<div style="float: left">
			<h4> Store in Grocery List </h4>
		</div>
		<div style="float: left; padding-top: 10px; padding-left: 10px">
			{!! Form::checkbox('inGroceryList', 'true', false) !!}
		</div>

		<div>
		<div style="float: left; padding-left: 30px;">
			<h4> Store in Pantry</h4>
		</div>
		<div style="float: left; padding-top: 10px; padding-left: 10px">
			{!! Form::checkbox('inPantry', 'true', false) !!}
		</div>
	</div>

	<hr width="100%;">

	<div class="form-group">
		{!! Form::submit('Add food item', ['class' => 'btn btn-primary form-control']) !!}
	</div>

	<div class="form-group">
		<a id="cancel-button" href="/home" class="btn btn-danger">Cancel</a>
	</div>
	{!! Form::close() !!}


@stop