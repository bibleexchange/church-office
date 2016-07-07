@extends('app')

@section('content-header')

<h1>
	All Transactions
</h1>

<ol class="breadcrumb">
   <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/accounting"><i class="fa fa-money"></i> Accounting</a></li>
   <li><a href="/accounting/transactions">Transactions</a><</li>
   <li class="active">{!!$transaction->id!!}</li>
</ol>

@stop

@section('body')

<center><button class="btn success print-hide" onclick="window.print()">Print View</button></center>
<hr>

<table id="deposit_slip">
	<tr>
		<td class='style5' colspan='4' rowspan='2'>Deliverance Center</td>
		<td class='style2' colspan='14'>930 Old Post Rd. Arundel, Maine 04046 - (207) 774-8192</td>
	</tr>
	<tr>
		<td class='style2' colspan='14'>CONTACT: Stephen Reynolds, Jr.,  EMAIL: info@deliverance.me</td>
	</tr>
	<tr>
		<td class='style18' >Deposit Date:</td>
		<td class='style15' colspan='2'>{{ $transaction->date }}</td>
		<td class='style18' colspan='5'>Account Number:</td>
		
		<td class='style15' colspan='3'>{{ $transaction->to->getMeta('account_number')}}</td>
		<td class='style18' colspan='5'>Nickname: </td>
		<td class='style15' colspan='2'>{{ $transaction->to->getMeta('title') }}</td>
	</tr>
	<tr>
		<td colspan='18'>&nbsp;</td>
	</tr>
	<tr>
		<td class='style15' style='height: 21' > </td>
		<td class='style15' style='height: 21' colspan='2'> </td>
		<td class='CoinsBills' rowspan='7' colspan='2'></td>
		<td class='CoinsBills' rowspan='7' ><span class='CoinsBills'>COINS</span></td>
		<td style='height: 21px' class='style18' colspan='3'>Pennies: </td>
		<td style='height: 21' class='style15' >{{$details->penny }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{ $details->value('penny') }}</td>
		<td class='CoinsBills' rowspan='7' colspan='3'></td>
		<td rowspan='7' ><span class='CoinsBills'>BILLS</span></td>
		<td style='height: 21px' class='style18' >$1: </td>
		<td style='height: 21px' class='style15' >{{$details->oneD }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$details->value('oneD') }}</td>
	</tr>
	<tr><!-- 14 -->
		<td class='style18' >Sum of Checks: </td>
		<td class='style15' colspan='2'>$&nbsp;{{number_format($details->checks_sum,2)}}</td>
		<td class='style18' colspan='3'>Nickels: </td>
		<td class='style15' >{{$details->nickel}}</td>  
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$details->value('nickel') }}</td>
		<td class='style18' >$2: </td>
		<td class='style15' >{{$details->twoD}}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$details->value('twoD') }}</td>
	</tr>
	<tr>
		<td class='style18' >Count of Checks: </td>
		<td class='style15' colspan='2'>{{ $details->checks }}</td>
		<td class='style18' colspan='3'>Dimes:&nbsp; </td>
		<td class='style15' >{{$details->dime }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$details->value('dime')}}</td>
		<td class='style18' >$5: </td>
		<td class='style15' >{{ $details->fiveD }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$details->value('fiveD')}}</td>
	</tr>
	<tr>
		<td class='style18' >&nbsp;</td>
		<td class='style15' colspan='2'>&nbsp;</td>
		<td class='style18' colspan='3'>Quarters: </td>
		<td class='style15' >{{$details->quarter}}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$details->value('quarter')}}</td>
		<td class='style18' >$10: </td>
		<td class='style15' >{{$details->tenD}}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$details->value('tenD')}}</td>
	</tr>
	<tr>
		<td class='style18' >Sum of Cash:</td>
		<td class='style15' colspan='2'>$&nbsp;{{number_format($details->cash(),2)}}</td>
		<td class='style18' colspan='3'>Half Dollars: </td>
		<td class='style15' >{{$details->halfD }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$details->value('halfD')}}</td>
		<td class='style18' >$20: </td>
		<td class='style15' >{{$details->twentyD }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$details->value('twentyD')}}</td>
	</tr>
	<tr>
		<td class='style18' >Sum of Coins:</td>
		<td class='style15' colspan='2'>$&nbsp;{{number_format($details->coins(),2)}}</td>
		<td class='style15'  colspan='5' >&nbsp;</td>
		<td class='style18'  >$50: </td>
		<td class='style15' >{{$details->fiftyD}}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$details->value('fiftyD')}}</td>
	</tr>
	<tr>
		<td class='style15' colspan='2'><span class="print-only">Deposit Total: $&nbsp;{!!$transaction->amount!!}</span>&nbsp;</td>
		<td class='style15'  colspan='11' >&nbsp;</td>
		<td class='style18'>$100: </td>
		<td class='style15'>{{$details->hundredD}}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$details->value('hundredD')}}</td>
	</tr>
</table>

<div class="print-hide">

		Deposit Total: $&nbsp;	
	{!! Form::open([
	'url'=>'/accounting/transactions/'.$transaction->id,
	'method'=>'patch',
	'style'=>'display:inline-block;'
	]) !!}
		{!! Form::hidden('transaction_id', $transaction->id) !!}
		{!! Form::text('amount', $transaction->amount, array('style'=>'display:inline;', 'placeholder'=>'Amount')) !!}
		<button class="btn success" type="submit" value="NEW Gift"><span class="glyphicon glyphicon-ok"></span></button>
	{!! Form::close() !!}
		
		{!!$transaction->amountValidate()!!}
<hr>

@include('accounting/transactions/form',["url"=>"/accounting/transactions/".$transaction->id,"method"=>"patch","submit_text"=>"Update Transaction"])

<hr>

@include('accounting/transactions/form-details',["url"=>"/accounting/transactions/".$transaction->id."/details","method"=>"post","submit_text"=>"Update Details"])

<hr>
<hr>
<br>
<br><br>
<br>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			@include('accounting/parts/confirm-delete')
		</div>
	</div>
</div>
<br>
<br>
<br>
<br>
<br>
</div>

@stop