<tr>
{!! Form::open(array('url'=>'accounting/gifts', 'class'=>'well form-inline','role'=>'form','id'=>'gifts')) !!}
{!! Form::hidden('offering_id', $offering->id) !!}
<td colspan="3">
		<button class="reset">clear</button>		
		<input id="giver_{{$offering->id}}" name="giver" type="text" placeholder="Giver" value="Anonymous Anonymous">
		<input id="giverid_{{$offering->id}}" type="text" name="contact_id" value="395">
		<div id="my-suggestions_{{$offering->id}}" ></div>
</td>
<td>		

		{!! Form::text('other', NULL, array('class'=>'', 'placeholder'=>'Check amount')) !!}	
</td>
<td>		
		{!! Form::text('seriel', NULL, array('class'=>'', 'placeholder'=>'Seriel Number')) !!}	
</td>
<td colspan="2">		
		{!! Form::text('memo', null, array('class'=>'', 'placeholder'=>'Memo')) !!}	
</td>

</tr>

<tr>
<td>		
		{!! Form::text('penny', NULL, array('class'=>'', 'placeholder'=>'.01')) !!}
</td>
<td>		
		{!! Form::text('nickel', NULL, array('class'=>'', 'placeholder'=>'.05')) !!}
</td>
<td>		
		{!! Form::text('dime', NULL, array('class'=>'', 'placeholder'=>'.10')) !!}
</td>
<td>		
		{!! Form::text('quarter', NULL, array('class'=>'', 'placeholder'=>'.25')) !!}
</td>
<td>		
		{!! Form::text('halfD', NULL, array('class'=>'', 'placeholder'=>'.50')) !!}
</td>


<td>
<button class="btn success" type="submit" value="NEW Gift"><span class="glyphicon glyphicon-ok"></span></button>
</td>

</tr>
<tr>
<td>		
		{!! Form::text('oneD', NULL, array('class'=>'', 'placeholder'=>'$1')) !!}
</td>
<td>		
		{!! Form::text('twoD', NULL, array('class'=>'', 'placeholder'=>'$2')) !!}
</td>
<td>		
		{!! Form::text('fiveD', NULL, array('class'=>'', 'placeholder'=>'$5')) !!}
</td>
<td>		
		{!! Form::text('tenD', NULL, array('class'=>'', 'placeholder'=>'$10')) !!}
</td>
<td>		
		{!! Form::text('twentyD', NULL, array('class'=>'', 'placeholder'=>'$20')) !!}
</td>
<td>		
		{!! Form::text('fiftyD', NULL, array('class'=>'', 'placeholder'=>'$50')) !!}
</td>
<td>		
		{!! Form::text('hundredD', NULL, array('class'=>'', 'placeholder'=>'$100')) !!}
</td>

{!! Form::close() !!}

</tr>