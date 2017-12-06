@extends('layouts.app')

@section('content')
	<h1 id="Header">About this web application</h1>
	<hr style="width: 100%">
	<h2 id="Header">Project Description</h2>
	<p style="margin-left: 30px;">This application is meant to be a simple grocery list utility. It implements the following features.</p>
	<ul>
		<li>Ability to have multiple users</li>
		<li>Ability to add food to a virtual grocerylist and pantry</li>
		<li>Ability to move food from virtual grocerylist to pantry and vice versa</li>
		<li>Ability to remove food from virtual grocerylist and pantry</li>
		<li>Ability to toggle between 'stacked' and 'normal' view on dashboard</li>
		<li>Ability to locate restaurants near by</li>
	</ul>
	<h2 id="Header">Group Members</h2>
	<div class=row>
		<div class=col-xs-6>
			<table class="table table-striped" id="table" style="margin-left: 30px;">
			    <tr>
			        <th>Name</th>
			        <th>Email</th>
			      
			    </tr>
			    <tr id="row">
			    	<td id="col">Dan Morton</td> 
			    	<td id="col">morton26@purdue.edu</td> 
			    </tr>

			    <tr id="row">
			    	<td id="col">Joey Singer</td> 
			    	<td id="col">singer6@purdue.edu</td> 
			    </tr>

			    <tr id="row">
			    	<td id="col">Pallav Kamojjh</td> 
			    	<td id="col">pkamojjh@purdue.edu</td> 
			    </tr>
	              
	     </table>
		</div>
	</div>

	<h2 id="Header">Technologies Used</h2>
	<p style="margin-left: 30px; margin-bottom: 50px;">This applocation was written using PHP 7 and the Laravel framework. You can read about laravel here: <a href="https://laravel.com">Link</a>. A MYSQL database is used for data continuity. This website is hosted using Laravel Forge (<a href="https://forge.laravel.com">Link</a>) utilizing an Amazon AWS EC2 instance.</p>
@stop
