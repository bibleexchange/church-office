{!! Form::open(['url'=>$url,'method'=>$method,'id'=>'transaction_form']) !!}

	{!! Form::hidden('transaction_id', $transaction->id) !!}
	
<div class="row">
  <div class="col-lg-6">

	<div class="form-group">   
		<div class="input-group">
		  <div class="input-group-addon">Checks Sum: </div>
		  {!! Form::text('checks_sum', $details->checks_sum, array('class'=>'form-control', 'placeholder'=>'Check amount',
		  'onChange'=> 'calculateChecks()')) !!}
		</div>
	</div>
	<div class="form-group">		
		<div class="input-group">
		  <div class="input-group-addon">Checks #:</div>
		  {!! Form::text('checks', $details->checks, array('class'=>'form-control', 'placeholder'=>'Checks Count')) !!}
		</div>
	</div>
	<div class="form-group">		
		<div class="input-group">
		  <div class="input-group-addon">Pennies:</div>
		  {!! Form::text('penny', $details->penny, array('class'=>'form-control', 'placeholder'=>'.01')) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="input-group">
		  <div class="input-group-addon">Nickels:</div>
		  {!! Form::text('nickel', $details->nickel, array('class'=>'form-control', 'placeholder'=>'.05')) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="input-group">
		  <div class="input-group-addon">Dimes:</div>
		  {!! Form::text('dime', $details->dime, array('class'=>'form-control', 'placeholder'=>'.10')) !!}
		</div>
	</div>
	<div class="form-group">		
		<div class="input-group">
		  <div class="input-group-addon">Quarters:</div>
		  {!! Form::text('quarter', $details->quarter, array('class'=>'form-control', 'placeholder'=>'.25')) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="input-group">
		  <div class="input-group-addon">Half Dollars:</div>
		  {!! Form::text('halfD', $details->halfD, array('class'=>'form-control', 'placeholder'=>'.50')) !!}
		</div>
			</div>

  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">$1: </div>
			{!! Form::text('oneD', $details->oneD, array('class'=>'form-control', 'placeholder'=>'$1')) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">$2: </div>
			{!! Form::text('twoD', $details->twoD, array('class'=>'form-control', 'placeholder'=>'$2')) !!}
		</div>
	</div>
	<div class="form-group">	
		<div class="input-group">
			<div class="input-group-addon">$5: </div>
			{!! Form::text('fiveD', $details->fiveD, array('class'=>'form-control', 'placeholder'=>'$5')) !!}
		</div>
	</div>
	<div class="form-group">	
		<div class="input-group">
			<div class="input-group-addon">$10: </div>
			{!! Form::text('tenD', $details->tenD, array('class'=>'form-control', 'placeholder'=>'$10')) !!}
		</div>
	</div>
	<div class="form-group">	
		<div class="input-group">
			<div class="input-group-addon">$20: </div>
			{!! Form::text('twentyD', $details->twentyD, array('class'=>'form-control', 'placeholder'=>'$20')) !!}
		</div>
	</div>
	<div class="form-group">	
		<div class="input-group">
			<div class="input-group-addon">$50: </div>
			{!! Form::text('fiftyD', $details->fiftyD, array('class'=>'form-control', 'placeholder'=>'$50')) !!}
		</div>		
	</div>
	<div class="form-group">
	<div class="input-group">
		<div class="input-group-addon">$100: </div>
			{!! Form::text('hundredD', $details->hundredD, array('class'=>'form-control', 'placeholder'=>'$100')) !!}
		</div>	
	</div>
	</div>
	
	
  </div><!-- /.col-lg-6 -->

<div class="row">
  <div class="col-lg-12">
	<button class="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> {{$submit_text}}</button>
	{!! Form::close() !!}
  </div>
</div>