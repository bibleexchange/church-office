<div class="box box-danger" id="create-transaction">
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

	<div class="box-footer">
@include('accounting.transactions.form',["url"=>"/accounting/transactions","method"=>"post","submit_text"=>"Create"])
		</div><!-- /.row -->
	</div><!-- /.box-footer -->
</div><!-- /.box -->
