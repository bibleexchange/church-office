@extends('app')

@section('content-header')

 <h1>
	All Reports
</h1>

<ol class="breadcrumb">
   <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/accounting"><i class="fa fa-money"></i> Accounting</a></li>
   <li class="active">Reports</li>
</ol>

@stop

@section('body')

<div class="row">

	<section class="col-md-12 connectedSortable">     
		<ul>
		@foreach($reports AS $report)
			<li><a href="{{$report->url}}">{{$report->title}}</a></li>
		@endforeach
		</ul>
	</section>

</div>
@stop