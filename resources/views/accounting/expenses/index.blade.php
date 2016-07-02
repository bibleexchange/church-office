@extends('app')

@section('content-header')

 <h1>
	Expenses Register : $ {!! number_format($expenses->sum('amount')) !!}
	<small>({!!$range[0]!!} to {!!$range[1]!!})</small>
</h1>

<div>
	<a href="?range_start=2010-01-01&&range_end=2020-12-31">all time</a> | 
	<a href="?range_start=2013-01-01&&range_end=2013-12-31">2013</a> | 
	<a href="?range_start=2014-01-01&&range_end=2014-12-31">2014</a> | 
	<a href="?range_start=2015-01-01&&range_end=2015-12-31">2015</a> | 
</div>

<ol class="breadcrumb">
   <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/accounting"><i class="fa fa-money"></i> Accounting</a></li>
   <li class="active">Expenses</li>
</ol>

@stop

@section('body')

<section class="col-md-12 connectedSortable">     
	@include('accounting\parts\categorized_expenses', [$items, $colors])
</section>

<section class="col-md-12 connectedSortable">     
	@include('accounting\expenses\editable_expenses', [$expenses])
</section>

@stop