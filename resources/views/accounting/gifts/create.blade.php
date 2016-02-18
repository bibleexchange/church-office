@extends('app')

@section('body')
	
	<h2>
		<a href="/accounting/deposits/{{$offering->deposit->id}}#{{$offering->name}}"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a> 
		New Gift</h2>
	
	@include('accounting.parts.create_gift')	
	
@stop
