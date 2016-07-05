{!! Form::open(['url'=>$url,'method'=>$method,'id'=>'transaction_form']) !!}

	{!! Form::hidden('transaction_id', $transaction->id) !!}
	<br>
	<span class="trans-label">Checks Sum:</span>
	{!! Form::text('checks_sum', $details->checks_sum, array('class'=>'', 'placeholder'=>'Check amount')) !!}
	
	<span class="trans-label">Checks #:</span>
	{!! Form::text('checks', $details->checks, array('class'=>'', 'placeholder'=>'Checks Count')) !!}
	
	<span class="trans-label">Pennies:</span>
	{!! Form::text('penny', $details->penny, array('class'=>'', 'placeholder'=>'.01')) !!}
	
	<span class="trans-label">Nickels:</span>
	{!! Form::text('nickel', $details->nickel, array('class'=>'', 'placeholder'=>'.05')) !!}
	
	<span class="trans-label">Dimes:</span>
	{!! Form::text('dime', $details->dime, array('class'=>'', 'placeholder'=>'.10')) !!}
	
	<span class="trans-label">Quarters:</span>
	{!! Form::text('quarter', $details->quarter, array('class'=>'', 'placeholder'=>'.25')) !!}
	
	<span class="trans-label">Half Dollars:</span>
	{!! Form::text('halfD', $details->halfD, array('class'=>'', 'placeholder'=>'.50')) !!}

	<span class="trans-label">$1: </span>
	{!! Form::text('oneD', $details->oneD, array('class'=>'', 'placeholder'=>'$1')) !!}
	
	<span class="trans-label">$2: </span>
	{!! Form::text('twoD', $details->twoD, array('class'=>'', 'placeholder'=>'$2')) !!}
	
	<span class="trans-label">$5: </span>
	{!! Form::text('fiveD', $details->fiveD, array('class'=>'', 'placeholder'=>'$5')) !!}
	
	<span class="trans-label">$10: </span>
	{!! Form::text('tenD', $details->tenD, array('class'=>'', 'placeholder'=>'$10')) !!}
	
	<span class="trans-label">$20: </span>
	{!! Form::text('twentyD', $details->twentyD, array('class'=>'', 'placeholder'=>'$20')) !!}
	
	<span class="trans-label">$50: </span>
	{!! Form::text('fiftyD', $details->fiftyD, array('class'=>'', 'placeholder'=>'$50')) !!}
	
	<span class="trans-label">$100: </span>
	{!! Form::text('hundredD', $details->hundredD, array('class'=>'', 'placeholder'=>'$100')) !!}
	
	<button class="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> {{$submit_text}}</button>
{!! Form::close() !!}