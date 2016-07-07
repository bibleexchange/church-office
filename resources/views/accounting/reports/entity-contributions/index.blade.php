@extends('app')

@section('content-header')

<h1>
	Entity Contributions
</h1>

<ol class="breadcrumb">
   <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/accounting"><i class="fa fa-money"></i> Accounting</a></li>
	<li><a href="/accounting/reports"><i class="fa fa-money"></i> Reports</a></li>
   <li class="active">Entity Transactions</li>
</ol>

@stop

@section('body')
	

	<h1 id="header">List of People and Organizations</h1> 
	
	<ul id="list" class="row" style="padding-left:0;">
		 @foreach($cards AS $card)
		 <li class="col-md-6" style="list-style:none;">
			 <a style="color:white;"><span style="display:none">{{$card->data}} {{$card->dataPost}} {{$card->title}}</span>
				@include('card',[$card])
			</a>
		 </li>
		@endforeach
	</ul>
@stop