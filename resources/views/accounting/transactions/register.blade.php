	<div class="box box-danger" id="loading-example">
		<div class="box-header">
			<!-- tools box -->
			<div class="pull-right box-tools">
				<button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload"><i class="fa fa-refresh"></i></button>
				<button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div><!-- /. tools -->
			<i class="fa fa-cloud"></i>

			<h3 class="box-title">{{$title}}</h3>
		</div><!-- /.box-header -->
		
		<style>
		
		.expensed {display:inline-block; overflow:hidden; width:12%;}
		
		.check {width:55px;}
		.amount {width:70px;}
		.memo {width:100px;}
		.payee {width:200px;}
		.category {width:155px;}
		.account {}
		.date {}
		.submit {margin-left:20px;}
		
		</style>
		
		<div class="box-footer">
	<?php
		$register_balance = 0;
	?>
	
	<table>
	@foreach($entries AS $entry)
	
	
	<tr>
		<td><a href="{{$entry->url}}">
		$ {!! $entry->amount !!} | 
		</a>
		</td>
		<td>
		{!! $entry->date !!}
		</td>
		<td>
			(<strong>{!! $entry->category !!}</strong>) {!! $entry->from !!} -> {!! $entry->to!!}
		</td>
		<td>
			{!! $entry->balance !!}
		</td>
	</tr>
	@endforeach
	</table>
			</div><!-- /.row -->
		</div><!-- /.box-footer -->
	</div><!-- /.box -->    