@extends('app')

@section('body')

<div>
	<a href="?range_start=2010-01-01&&range_end=2020-12-31">all time</a> | 
	<a href="?range_start=2013-01-01&&range_end=2013-12-31">2013</a> | 
	<a href="?range_start=2014-01-01&&range_end=2014-12-31">2014</a> | 
	<a href="?range_start=2015-01-01&&range_end=2015-12-31">2015</a> | 
</div>

<h1>Expenses Register <strong>$ {!! number_format($expenses->sum('amount')) !!}</strong> <sup>({!!$range[0]!!} to {!!$range[1]!!})</sup></h1>
	
<section class="col-lg-6 connectedSortable">     
	@include('accounting\parts\categorized_expenses', [$items, $colors])
</section><!-- /.Left col -->

<section class="col-lg-6 connectedSortable">  
	@include('accounting\parts\expense_form')
</section>

<table>
	<tbody>
	<tr>
		<th>Check #</th>
		<th>$</th>
		<th>Memo</th>
		<th>Payee</th>
		<th>Category</th>
		<th>Account</th>
		<th>date</th>
	</tr>
	@foreach($expenses AS $expense)
	<tr>
		
		{!! Form::open() !!}
			<th>{!! Form::text('reference', $expense->reference) !!}</th>
			<th>{!! Form::text('amount', $expense->amount) !!}</th>
			<th>{!! Form::text('payee', $expense->payee) !!}</th>
			<th>{!! Form::select('category', $categories ,$expense->category_id) !!}</th>
			<th>{!! Form::select('account', $accounts ,$expense->account->id) !!}</th>
			<th>{!! Form::text('created_at', $expense->created_at) !!}</th>
			<th>{!! Form::text('memo', $expense->memo) !!}</th>
			
			<th>
			<button class="btn btn-default btn-xs" type="submit" value="">
				<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
			</button>
			</th>
		{!! Form::close() !!}
		
	</tr>
	@endforeach
	<tbody>
</table>

@stop