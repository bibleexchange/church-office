{!! Form::open(['url'=>$url,'method'=>$method,'id'=>'transaction_form']) !!}
	{!! Form::hidden('transaction_id', $transaction->id) !!}
	
	<div class="form-group">
		<div class="input-group">
		  <div class="input-group-addon">$ </div>
		  {!! Form::text('amount', $transaction->amount,[
		  'id'=>'amount_for_'.$transaction->id,
		  'class'=>'form-control',
		  'placeholder'=>'Amount',
		  'onChange'=> 'calculateChecks()'
		  ]) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="input-group">
		  <div class="input-group-addon">From </div>
		  {!! Form::select('from_entity_id', ["RECENT"=>$recentFrom, "ALPHABETICAL"=> $entities->toArray() ] ,$transaction->from_entity_id,['id'=>'transaction-from-entity-'.$transaction->id,'class'=>'form-control','style'=>'width:100%;'])!!}
		</div>
	</div>

	<div class="form-group">
		<div class="input-group">
		  <div class="input-group-addon">To </div>
		  {!! Form::select('to_entity_id', ["RECENT"=>$recentTo, "ALPHABETICAL"=> $entities->toArray() ],$transaction->to_entity_id,['id'=>'transaction-to-entity-'.$transaction->id,'class'=>'form-control','style'=>'width:100%;'])!!}
		</div>
	</div>
	
	<div class="form-group">
		<div class="input-group">
		  <div class="input-group-addon">Category </div>
		  {!! Form::select('category_id', ["RECENT"=>$recentCat, "ALPHABETICAL"=> $categories->toArray() ] ,$transaction->category_id,['id'=>'transaction-category-'.$transaction->id,'class'=>'form-control','style'=>'width:100%;']) !!}
		</div>
	</div>
	
	<div class="form-group">
		<div class="input-group">
		  <div class="input-group-addon">Date </div>
		  {!! Form::text('date', $transaction->date,['class'=>'form-control','id'=>'date_' . $transaction->id]) !!}
		</div>
	</div>
	
	<div class="form-group">
		<div class="input-group">
		  <div class="input-group-addon">Memo </div>
		  {!! Form::text('memo', $transaction->memo,['class'=>'form-control','placeholder'=>'Memo']) !!}
		</div>
	</div>
	
	<div class="form-group">
		<div class="input-group">
		  <div class="input-group-addon">Check # </div>
		  {!! Form::text('seriel', $transaction->seriel,['class'=>'form-control','placeholder'=>'Check #/Seriel']) !!}
		</div>
	</div>
			
	<button class="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> {{$submit_text}}</button>
{!! Form::close() !!}

@section('scripts')
@parent
$({!!'\'#transaction-to-entity-'.$transaction->id .'\''!!}).select2();
$({!!'\'#transaction-from-entity-'.$transaction->id .'\''!!}).select2();
$({!!'\'#transaction-category-'.$transaction->id .'\''!!}).select2();

@stop