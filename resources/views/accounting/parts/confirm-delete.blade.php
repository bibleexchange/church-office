<div class="btn-group" role="group" style="width:100%; height:60px;">  
	<div class="btn-group" role="group" style="width:100%; height:100%;">
		
		<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%; height:100%;">
		  <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
		  DELETE <span class="caret"></span>
		</button>
		
		<ul class="dropdown-menu" style="padding:0; margin:0;">
		  <li>{!! Form::open(['url'=>'/accounting/transactions/'.$transaction->id,'method'=>'delete','class'=>'delete']) !!}
				{!! Form::hidden('transaction_id', $transaction->id) !!}
				<button class="btn-warning" style="width:100%; height:60px;">
				<span class="glyphicon glyphicon-remove"></span> Are you sure? YES</button>
			{!! Form::close() !!}</li>
		  <li><button style="width:100%; height:60px;" class="cancel-button" onclick="confirmDelete({!!$transaction->id!!})"><span class="glyphicon glyphicon-left-arrow" ></span>  Cancel
			</button></li>
		</ul>
		
	</div>
</div>