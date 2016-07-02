@extends('app')

@section('content-header')

 <h1>
	Deposit
	<small>Offerings</small>
</h1>
<ol class="breadcrumb">
   <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/accounting"><i class="fa fa-money"></i> Accounting</a></li>
   <li class="active">Deposits</li>
</ol>

@stop

@section('body')

 {!! Form::open(array('url'=>'accounting/deposits', 'class'=>'well form-inline','role'=>'form','id'=>'gifts')) !!}
<h2>New Deposit</h2>
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

 <div class="row">
	 @foreach($cards AS $card)
	 <div class="col-md-10 col-md-offset-1">
		@include('card',[$card])
	 </div>
	@endforeach
</div>

@stop