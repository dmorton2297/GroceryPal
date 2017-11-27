@extends('master')

@section('style')
	<style type="text/css">
		#Header{
			padding-left: 20px;
		}
	</style>
@stop

@section('body')
	<!-- Create a header for the form -->
	<h1 id="Header">Add food item</h1>

	{!! Form::model($item, array('route' => array('FoodItem.update', $item->id))) !!}


@stop