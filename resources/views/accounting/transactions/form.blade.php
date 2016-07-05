{!! Form::open(['url'=>$url,'method'=>$method,'id'=>'transaction_form']) !!}
	{!! Form::hidden('transaction_id', $transaction->id) !!}
	
	<span class="trans-label">Amount:</span>
	{!! Form::text('amount', $transaction->amount,['class'=>'amount']) !!}
	
	<hr>
	
	<span class="trans-label">From:</span>
	{!! Form::select('from_entity_id', $entities ,$transaction->from_entity_id,['class'=>'payee'])!!}
	
	<hr>
	
	<span class="trans-label">To:</span>
	{!! Form::select('to_entity_id', $entities ,$transaction->to_entity_id,['class'=>'payee'])!!}
	
	<hr>
	
	<span class="trans-label">Category:</span>
	{!! Form::select('category_id', $categories ,$transaction->category_id,['class'=>'category']) !!}
	
	<hr>
	
	<span class="trans-label">Date:</span>
	{!! Form::text('date', $transaction->date,['class'=>'date','id'=>'date_' . $transaction->id]) !!}

	<hr>
	
	<span class="trans-label">Memo:</span>
	{!! Form::text('memo', $transaction->memo,['class'=>'memo']) !!}
	
	<hr>
	
	<span class="trans-label">Seriel #:</span>
	{!! Form::text('seriel', $transaction->seriel,['class'=>'check']) !!}
	
	<hr>
	
	<button class="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> {{$submit_text}}</button>
{!! Form::close() !!}