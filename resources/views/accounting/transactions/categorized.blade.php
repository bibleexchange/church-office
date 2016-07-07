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

			<h3 class="box-title">Balance: $ {!! number_format($entity->balance(),2) !!}</h3>
		</div><!-- /.box-header -->

		<div class="box-footer">
			<div class="row">
			<?php $x=0;?>
			@foreach($items AS $index => $value)
			
			@if($value->sum('amount') > 0)
				<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
					<input type="text" class="knob" value="{!!number_format($value->sum('amount'),2) !!}"
						data-readonly="true"
						data-width="120"
						data-height="120"
						data-fgColor="{!!$colors[$x]!!}"
						data-step="1000"
						data-min="0"
						data-max="10000"
					/>
					<div class="knob-label">{!! $index !!}</div>
				</div><!-- ./col -->
				
				<?php 
					
					if($x >= count($colors)-1){
						$x = 0; 
					}else{
						$x++;
					}
				
				?>
				
				@endif
			@endforeach
				
			</div><!-- /.row -->
		</div><!-- /.box-footer -->
	</div><!-- /.box -->    