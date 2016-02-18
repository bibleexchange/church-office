@extends('app')

@section('body')

 {!! Form::open(array('url'=>'accounting/deposits', 'class'=>'well form-inline','role'=>'form','id'=>'gifts')) !!}
<h2>Deposit</h2>
<div class="form-group">
{!! Form::label('deposited','Deposit Date') !!}
{!! Form::text('deposited', $depositedCurrentDate, array('class'=>'', 'placeholder'=>'$depositedCurrentDate')) !!}
</div>
<div class="form-group">
{!! Form::label('account_id','Acount') !!}
{!! Form::select('account_id', $accountsSelectList, 1) !!}
</div>
<div class="form-group">
{!! Form::label('memo','Memo') !!}
{!! Form::text('memo', NULL, array('class'=>'', 'placeholder'=>'memo')) !!}
</div>
{!! Form::submit('NEW Deposit', array('class'=>'btn'))!!}

{!! Form::close() !!}	

<h1>Deposits:</h1>

@foreach($deposits as $deposit)
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><a href="/accounting/deposits/{{$deposit->id}}">({{ $deposit->account->title }}) <strong>${{ $deposit->totalAmount() }}</strong> -  Deposited: {{ $deposit->deposited }}</a></div>
  <div class="panel-body">
    <p>
	@foreach ($deposit->offerings AS $offering)
		<a href="/accounting/offerings/{{$offering->id}}">{{ $offering->name }}</a> | 
	@endforeach
	</p>
  </div>
</div>
@endforeach
@stop