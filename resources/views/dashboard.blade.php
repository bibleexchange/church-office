@extends('app')

@section('content-header')

 <h1>
	Dashboard
	<small>Main</small>
</h1>
<ol class="breadcrumb">
   <li><i class="fa fa-dashboard active"></i> Dashboard</li>
</ol>

@stop

@section('body')

<center><h1>Deliverance Center House of Prayer</h1></center>
<hr>
                 <div class="row">
					 @foreach($cards AS $card)
					 <div class="col-md-8 col-md-offset-2">
						@include('card',[$card])
					 </div>
					@endforeach
				</div>
				
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-md-8 col-md-offset-2 connectedSortable"> 
					{{--@include('widgets/map')--}}
					{{--@include('widgets/chat')--}}
					{{--@include('widgets/to-do-list')--}}

					 {{--@include('widgets/loading-example')--}}
					 {{--@include('widgets/charts-example')   --}}
					 @include('widgets/calendar')
					 {{--@include('widgets/email')--}}
					</section>
				</div><!-- /.row (main row) -->

@stop