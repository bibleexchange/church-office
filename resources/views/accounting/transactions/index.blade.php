@extends('app')

@section('content-header')

 <h1>
	All Transactions
</h1>

<ol class="breadcrumb">
   <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/accounting"><i class="fa fa-money"></i> Accounting</a></li>
   <li class="active">Transactions</li>
</ol>

@stop

@section('body')

<div class="row">  

	<section class="col-md-12 connectedSortable">     
		
		@include('accounting\transactions\create',['title'=>'New Transaction',$entities,$categories,'transaction'=>$mostRecentTransaction])
	
		@include('accounting\transactions\editable', [$transactions,$categories,$entities,'title'=>'All Transactions'])
	</section>

</div>
@stop