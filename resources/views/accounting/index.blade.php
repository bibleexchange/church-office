@extends('app')

@section('content-header')

 <h1>
	Accounting
	<small>Main</small>
</h1>
<ol class="breadcrumb">
   <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
   <li class="active">Accounting</li>
</ol>

@stop

@section('body')

	<div class="row">
		 @foreach($cards AS $card)
		 <div class="col-md-6">
			@include('card',[$card])
		 </div>
		@endforeach
	</div>
	
@stop