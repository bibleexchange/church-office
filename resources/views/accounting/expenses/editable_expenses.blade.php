	<div class="box box-danger" id="loading-example">
		<div class="box-header">
			<!-- tools box -->
			<div class="pull-right box-tools">
				<button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload"><i class="fa fa-refresh"></i></button>
				<button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div><!-- /. tools -->
			<i class="fa fa-cloud"></i>

			<h3 class="box-title">Editable</h3>
		</div><!-- /.box-header -->
		
		<style>
		
		.expensed {display:inline-block; overflow:hidden; width:12%;}
		
		.check {width:75px;}
		.amount {}
		.memo {width:100px;}
		.payee {width:200px;}
		.category {width:155px;}
		.account {}
		.date {}
		.submit {margin-left:20px;}
		
		</style>
		
		<div class="box-footer">
			<div class="row">
				<div class="col-sm-12">
					<div class="expensed check">Check #</div>
					<div class="expensed amount">$</div>

					<div class="expensed payee">Payee</div>
					<div class="expensed category">Category</div>
					<div class="expensed account">Account</div>
					<div class="expensed date">date</div>
					<div class="expensed memo">Memo</div>
					<div class="expensed submit"></div>
				</div>
			</div>

	@foreach($expenses AS $expense)
	<div class="row">
		<div class="col-sm-12">
		{!! Form::open(['url'=>'/accounting/expenses/'.$expense->id,'method'=>'update']) !!}
			{!! Form::hidden('expense_id', $expense->id) !!}
			<div class="expensed check">{!! Form::text('reference', $expense->reference) !!}</div>
			<div class="expensed amount">{!! Form::text('amount', $expense->amount) !!}</div>
			<div class="expensed payee">{!! Form::text('payee', $expense->payee) !!}</div>
			<div class="expensed category">{!! Form::select('category_id', $categories ,$expense->category_id) !!}</div>
			<div class="expensed account">{!! Form::select('account_id', $accounts ,$expense->account->id) !!}</div>
			<div class="expensed date">{!! Form::text('created_at', $expense->created_at) !!}</div>
			<div class="expensed memo">{!! Form::text('memo', $expense->memo) !!}</div>
			<div class="expensed submit"><button><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button></div>
		{!! Form::close() !!}
		</div>
	</div>
	@endforeach

			
				
			</div><!-- /.row -->
		</div><!-- /.box-footer -->
	</div><!-- /.box -->    