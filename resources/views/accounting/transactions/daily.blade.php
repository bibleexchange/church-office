@extends('app')

@section('content-header')

 <h1>
	Daily Balances
</h1>

<ol class="breadcrumb">
   <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/accounting"><i class="fa fa-money"></i> Accounting</a></li>
   <li class="active">Daily Balances</li>
</ol>

@stop

@section('body')

<div class="row">

	<section class="col-md-12 connectedSortable">
		@include('accounting.transactions.register', [$entries,'title'=>'Register: $ ' . $register_balance])
	</section>

</div>
@stop
