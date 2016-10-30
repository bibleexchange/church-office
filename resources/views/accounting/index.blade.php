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

	<div class="row connectedSortable">

		<section class="col-md-12 connectedSortable">
@include('accounting.transactions.create',['title'=>'New Transaction',$entities,$categories,'transaction'=>$mostRecentTransaction])
		</section>

		 @foreach($cards AS $card)
		 <section class="col-md-6">
			@include('card',[$card])
		 </section>
		@endforeach
	</div>

@stop
