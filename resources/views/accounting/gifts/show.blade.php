@extends('app')

@section('body')

{{ Form::open(array('url'=>'accounting/gifts', 'class'=>'well form-inline','role'=>'form','id'=>'gifts')) }}
<h3>Donation for Offering: 
	<!--<div class="form-group">
		{{ Form::label('offerings_id','Offering Id') }}-->
		{{ Form::select('offerings_id', $offerings) }}
	<!--</div>
	
	<div class="form-group">-->
		{{ Form::label('contact_id','Giver: ') }}
		{{ Form::select('contact_id', $givers, '395') }}
		</h3>
	<!--</div>-->
			
	<div class="col-xs-12">
		<div class="form-group checkamount">
			{{ HTML::image("assets/office/blankCheckAmount.jpg", $alt="Check", $attributes = array('class'=>'')) }}
			{{ Form::label('other','Check') }}
			{{ Form::text('other', NULL, array('class'=>'', 'placeholder'=>'Check amount')) }}	
		</div>
		<div class="form-group checkseriel">
			{{ HTML::image("assets/office/blankCheckNu.jpg", $alt="Check", $attributes = array('class'=>'')) }}
			{{ Form::label('seriel','Check #') }}
			{{ Form::text('seriel', NULL, array('class'=>'', 'placeholder'=>'Seriel Number')) }}	
		</div>
		<div class="form-group memo">
			{{ Form::label('memo','Memo') }}
			{{ Form::text('memo', null, array('class'=>'', 'placeholder'=>'Memo')) }}	
		</div>
	</div>

	<div class="col-xs-6">
		<div class="form-group">
			{{ HTML::image("assets/office/penny.png", $alt="Check", $attributes = array('class'=>'')) }}
			{{ Form::label('penny','Pennies') }}
			{{ Form::text('penny', NULL, array('class'=>'', 'placeholder'=>'Pennies')) }}
		</div>
		<div class="form-group">
			{{ HTML::image("assets/office/nickel.png", $alt="Check", $attributes = array('class'=>'')) }}
			{{ Form::label('nickel','Nickels') }}
			{{ Form::text('nickel', NULL, array('class'=>'', 'placeholder'=>'Nickels')) }}
		</div>
		<div class="form-group">
			{{ HTML::image("assets/office/dime.png", $alt="Check", $attributes = array('class'=>'')) }}
			{{ Form::label('dime','Dimes') }}
			{{ Form::text('dime', NULL, array('class'=>'', 'placeholder'=>'Dimes')) }}
		</div>
		<div class="form-group">
			{{ HTML::image("assets/office/quarter.png", $alt="Check", $attributes = array('class'=>'')) }}
			{{ Form::label('quarter','Quarters') }}
			{{ Form::text('quarter', NULL, array('class'=>'', 'placeholder'=>'Quarters')) }}
		</div>
		<div class="form-group">
			{{ HTML::image("assets/office/half.png", $alt="Check", $attributes = array('class'=>'')) }}
			{{ Form::label('halfD','Half Dollar') }}
			{{ Form::text('halfD', NULL, array('class'=>'', 'placeholder'=>'Half Dollar')) }}
		</div>
		
	</div>
	<div class="col-xs-6">
		<div class="form-group">
		{{ HTML::image("assets/office/one.png", $alt="Check", $attributes = array('class'=>'')) }}
		{{ Form::label('oneD','Ones') }}
		{{ Form::text('oneD', NULL, array('class'=>'', 'placeholder'=>'Ones')) }}
		</div>
		<div class="form-group">
		{{ HTML::image("assets/office/two.png", $alt="Check", $attributes = array('class'=>'')) }}
		{{ Form::label('twoD','Twos') }}
		{{ Form::text('twoD', NULL, array('class'=>'', 'placeholder'=>'Twos')) }}
		</div>
		<div class="form-group">
		{{ HTML::image("assets/office/five.png", $alt="Check", $attributes = array('class'=>'')) }}
		{{ Form::label('fiveD','Fives') }}
		{{ Form::text('fiveD', NULL, array('class'=>'', 'placeholder'=>'Fives')) }}
		</div>
		<div class="form-group">
		{{ HTML::image("assets/office/ten.png", $alt="Check", $attributes = array('class'=>'')) }}
		{{ Form::label('tenD','Tens') }}
		{{ Form::text('tenD', NULL, array('class'=>'', 'placeholder'=>'Tens')) }}
		</div>
		<div class="form-group">
		{{ HTML::image("assets/office/twenty.png", $alt="Check", $attributes = array('class'=>'')) }}
		{{ Form::label('twentyD','Twenties') }}
		{{ Form::text('twentyD', NULL, array('class'=>'', 'placeholder'=>'Twenties')) }}
		</div>
		<div class="form-group">
		{{ HTML::image("assets/office/fifty.png", $alt="Check", $attributes = array('class'=>'')) }}
		{{ Form::label('fiftyD','Fifties') }}
		{{ Form::text('fiftyD', NULL, array('class'=>'', 'placeholder'=>'Fifties')) }}
		</div>
		<div class="form-group">
		{{ HTML::image("assets/office/hundred.png", $alt="Check", $attributes = array('class'=>'')) }}
		{{ Form::label('hundredD','Hundreds') }}
		{{ Form::text('hundredD', NULL, array('class'=>'', 'placeholder'=>'Hundreds')) }}
		</div>
	</div>

{{ Form::hidden('src_url', $src_url) }}
{{ Form::submit('NEW Gift', array('class'=>'btn'))}}

{{ Form::close() }}	


{{ Form::open(array('url'=>'office/gift','method' => 'get', 'class'=>'well form-inline','role'=>'form','id'=>'deposits')) }}
{{ Form::label('deposit_id','Deposit') }}
{{ Form::select('deposit_id', $deposits) }}
{{ Form::submit('View Deposit', array('class'=>'btn'))}}
{{ Form::close() }}	

	{{-- include('accounting.parts.deposit_slip') --}}
	
@stop