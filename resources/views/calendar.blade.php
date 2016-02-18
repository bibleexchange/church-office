@extends('app')

@section('body')

<iframe src="https://www.google.com/calendar/embed?src=deliverance.me_i03blh2q6kmo91inca7mitgrvg%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>

 <!-- Calendar 
 
 some day figure out google's api and connect google account to calendar
 
 -->
	<div class="box box-warning">
		<div class="box-header">
			<i class="fa fa-calendar"></i>
			<div class="box-title">Calendar</div>
			
			<!-- tools box -->
			<div class="pull-right box-tools">
				<!-- button with a dropdown -->
				<div class="btn-group">
					<button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li><a href="#">Add new event</a></li>
						<li><a href="#">Clear events</a></li>
						<li class="divider"></li>
						<li><a href="#">View calendar</a></li>
					</ul>
				</div>
			</div><!-- /. tools -->                                    
		</div><!-- /.box-header -->
		<div class="box-body no-padding">
			<!--The calendar -->
			<div id="calendar"></div>
		</div><!-- /.box-body -->
	</div><!-- /.box -->

@stop