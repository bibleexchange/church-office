{!! Form::open(array('url'=>'/accounting/gifts/'.$gift->id, 'class'=>'form-inline','role'=>'form')) !!}

{!! Form::hidden('offering_id', $offering->id) !!}
	
<div class="input-group input-group-sm">
  {!! Form::select('contact_id', $givers->lists('fullname','id'), $gift->contact->id) !!}
</div>


	<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">Check</span>
{!! Form::text('other', $gift->other, array('class'=>'', 'placeholder'=>'Check amount')) !!}	
</div>
	
<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">Seriel</span>
{!! Form::text('seriel', $gift->seriel, array('class'=>'', 'placeholder'=>'Seriel Number')) !!}
</div>		
	
<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">Memo</span>
{!! Form::text('memo', $gift->memo, array('class'=>'', 'placeholder'=>'Memo')) !!}
</div>

<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">.01</span>
{!! Form::text('penny', $gift->penny, array('class'=>'', 'placeholder'=>'.01')) !!}
</div>	

<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">.05</span>
{!! Form::text('nickel', $gift->nickel, array('class'=>'', 'placeholder'=>'.05')) !!}
</div>		

<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">.10</span>
{!! Form::text('dime', $gift->dime, array('class'=>'', 'placeholder'=>'.10')) !!}
</div>		

<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">.25</span>
{!! Form::text('quarter', $gift->quarter, array('class'=>'', 'placeholder'=>'.25')) !!}
</div>		

<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">.50</span>
{!! Form::text('halfD', $gift->halfD, array('class'=>'', 'placeholder'=>'.50')) !!}
</div>		

<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">$1</span>
{!! Form::text('oneD', $gift->oneD, array('class'=>'', 'placeholder'=>'$1')) !!}
</div>		

<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">$2</span>
{!! Form::text('twoD', $gift->twoD, array('class'=>'', 'placeholder'=>'$2')) !!}
</div>		

<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">$5</span>
{!! Form::text('fiveD', $gift->fiveD, array('class'=>'', 'placeholder'=>'$5')) !!}
</div>		

<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">$10</span>
{!! Form::text('tenD', $gift->tenD, array('class'=>'', 'placeholder'=>'$10')) !!}
</div>		

<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">$20</span>
{!! Form::text('twentyD', $gift->twentyD, array('class'=>'', 'placeholder'=>'$20')) !!}
</div>		 
<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">$50</span>
{!! Form::text('fiftyD', $gift->fiftyD, array('class'=>'', 'placeholder'=>'$50')) !!}
</div>		
		
<div class="input-group input-group-sm">
  <span class="input-group-addon" id="sizing-addon3">$100</span>
	{!! Form::text('hundredD', $gift->hundredD, array('class'=>'', 'placeholder'=>'$100')) !!}
</div>		
		<button class="btn btn-success" type="submit" value="save changes"><span class="glyphicon glyphicon-ok"></span></button>
		
{!! Form::close() !!}