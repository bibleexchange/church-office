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
		
		<center>{!!$transactions->render() !!}</center>
		
			<div class="row">
				<div class="col-sm-12">
					<div class="expensed amount">$</div>
					<div class="expensed payee">Payer</div>
					<div class="expensed payee">Payee</div>					
					<div class="expensed category">Category</div>
					<div class="expensed date">date</div>
					<div class="expensed memo">Memo</div>
					<div class="expensed check">Check #</div>
					<div class="expensed submit"></div>
				</div>
			</div>
<!--

[ 'amount','from_entity_id','to_entity_id', 'category_id','date','memo','seriel','last_edit_by_id'];
-->
	@foreach($transactions AS $transaction)
	<div class="row">
		<div class="col-sm-12">
		{!! Form::open(['url'=>'/accounting/transactions/'.$transaction->id,'method'=>'update']) !!}
			{!! Form::hidden('transaction_id', $transaction->id) !!}
			{!! Form::text('amount', $transaction->amount,['class'=>'expensed amount']) !!}
			{!! Form::select('from_entity_id', $entities ,$transaction->from_entity_id,['class'=>'expensed payee'])!!}
			{!! Form::select('to_entity_id', $entities ,$transaction->to_entity_id,['class'=>'expensed payee'])!!}
			{!! Form::select('category_id', $categories ,$transaction->category_id,['class'=>'expensed category']) !!}
			{!! Form::text('date', $transaction->date,['class'=>'expensed date']) !!}
			{!! Form::text('memo', $transaction->memo,['class'=>'expensed memo']) !!}
			{!! Form::text('seriel', $transaction->seriel,['class'=>'expensed check']) !!}
			<button class="expensed submit"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button>
		{!! Form::close() !!}
		</div>
	</div>
	@endforeach
	
			</div><!-- /.row -->
		</div><!-- /.box-footer -->
	</div><!-- /.box -->    