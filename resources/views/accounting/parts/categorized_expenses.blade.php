 <section class="col-lg-6 connectedSortable"> 
	<!-- Box (with bar chart) -->
	<div class="box box-danger" id="loading-example">
		<div class="box-header">
			<!-- tools box -->
			<div class="pull-right box-tools">
				<button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload"><i class="fa fa-refresh"></i></button>
				<button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div><!-- /. tools -->
			<i class="fa fa-cloud"></i>

			<h3 class="box-title">Categorized</h3>
		</div><!-- /.box-header -->


		<div class="box-footer">
			<div class="row">
				<!-- colors: #f56954 #00a65a #3c8dbc -->
			@foreach($items AS $index => $value)

				<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
					<input type="text" class="knob" data-readonly="true" value="{!!$value->sum('amount') !!}" data-width="60" data-height="60" data-fgColor="#f56954"/>
					<div class="knob-label">{!! $index !!}</div>
				</div><!-- ./col -->
			@endforeach
				
			</div><!-- /.row -->
		</div><!-- /.box-footer -->
	</div><!-- /.box -->        
</section><!-- /.Left col -->