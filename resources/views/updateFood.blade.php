@extends('layouts.app')

@section('content')
<h1 id="Header">Update Food</h1>
@if($message != '') 
		<script type="text/javascript">
			alert("{!! $message !!}")
		</script>
@endif


{!! Form::open(['route' => 'update_food', 'class' => 'form']) !!}
	<div class="form-group">
		{!! Form::label('id', 'Id: ') !!}
		{!! Form::text('id', $item->id, ['class' => 'form-control', 'readonly' => 'true']) !!}

		{!! Form::label('item', 'Item name: ') !!}
		{!! Form::text('item', $item->item, ['class' => 'form-control']) !!}

		{!! Form::label('description', 'Item descirption: ') !!}
		{!! Form::text('description', $item->description, ['class' => 'form-control']) !!}

		<div style="float: left">
			<h4> Store in Grocery List </h4>
		</div>
		<div style="float: left; padding-top: 10px; padding-left: 10px">
			{!! Form::checkbox('inGroceryList', 'true', $item -> inGroceryList) !!}
		</div>

		<div>
		<div style="float: left; padding-left: 30px;">
			<h4> Store in Pantry</h4>
		</div>
		<div style="float: left; padding-top: 10px; padding-left: 10px">
			{!! Form::checkbox('inPantry', 'true', $item -> inPantry) !!}
		</div>
	</div>

	<hr width="100%;">

	<div class="form-group">
		{!! Form::submit('Update food item', ['class' => 'btn btn-primary form-control']) !!}
	</div>

	<div class="form-group">
		<a id="cancel-button" href="/home" class="btn btn-danger">Cancel</a>
	</div>
	{!! Form::close() !!}
@stop