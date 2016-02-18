@extends('app')

@section('body')

<h1>Expenses Register</h1>

<p>
	<a href="?range_start=2010-01-01&&range_end=2020-12-31">all time</a> | 
	<a href="?range_start=2013-01-01&&range_end=2013-12-31">2013</a> | 
	<a href="?range_start=2014-01-01&&range_end=2014-12-31">2014</a> | 
	<a href="?range_start=2015-01-01&&range_end=2015-12-31">2015</a> | 
</p>
	
	<table>
		<tr>
			<th>Check #</th>
			<th>$</th>
			<th>Memo</th>
			<th>Payee</th>
			<th>Category</th>
			<th>Account</th>
			<th>date</th>
		</tr>
		
		<tr>
			<th></th>
			<th>$ {!! $expenses->sum('amount') !!}</th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	@foreach($expenses AS $expense)
	<tr>
		
		{!! Form::open() !!}
			{!! Form::text('reference', $expense->reference) !!}
			{!! Form::text('amount', $expense->amount) !!}
			{!! Form::text('memo', $expense->memo) !!}
			{!! Form::text('payee', $expense->payee) !!}
			{!! Form::text('category', $expense->category) !!}
			{!! Form::select('account', $accounts ,$expense->account->id) !!}
			{!! Form::text('created_at', $expense->reference) !!}
			
			<button class="btn btn-default btn-xs" type="submit" value="">
				<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
			</button>
			
		{!! Form::close() !!}
		
		<hr>
		
	</tr>
	@endforeach
	</table>
	
@stop