	<div class="box box-danger" id="loading-example">
		<div class="box-header">
			<!-- tools box -->
			<div class="pull-right box-tools">
				<button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload"><i class="fa fa-refresh"></i></button>
				<button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div><!-- /. tools -->
			<i class="fa fa-cloud"></i>

			<h3 class="box-title">{{$title}}</h3>
		</div><!-- /.box-header -->
			
		<div class="box-footer">
		
			<div class="row">
				<center>{!!$transactions->render() !!}</center>
			</div>
			
<?php $date = null; $hr = "<hr>"; ?>

	@foreach($transactions AS $transaction)
		
		<?php 
		if($date == $transaction->date){
			$hr = "<br>";
		}else{
			$date = $transaction->date;
			$hr = "<div class='date-break'>" . $transaction->present()->date ."</div>";
		}
		
		 ?>
	
	{!! $hr !!}
	<button class="transaction-button collapsed" data-toggle="collapse" data-target="#edit-{{$transaction->id}}">
	
		<div class="closed">
			<div class="expensed button"><span class="glyphicon glyphicon-edit"></span></div>
			<div class="expensed spacer"></div>
			<div class="expensed payer">$ {{$transaction->from->name}}</div>
			<div class="expensed spacer"><span class="glyphicon glyphicon-hand-right pull-right" aria-hidden="true"></span></div>
			<div class="expensed payer">{{$transaction->to->name}}</div>
<div class="expensed spacer"></div>
			<div class="expensed details">{{$transaction->seriel}} - {{$transaction->category->name}} - {{$transaction->memo}}</div>
			<div class="expensed amount">{{$transaction->amount}}</div>
		</div>	
		<div class="opened"><span class="glyphicon glyphicon-remove"></span> </span>
		</div>
	 </button>
	 
	 
	  <div id="edit-{{$transaction->id}}" class="edit-transaction collapse">
		
		<div class="row">
			<div class="col-md-6 transaction-options">
				<button class="delete-button delete" onclick="confirmDelete({!!$transaction->id!!})"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>  DELETE
				</button>
		
				<div id="delete-form-{!!$transaction->id!!}" class="hidden">
				
					{!! Form::open(['url'=>'/accounting/transactions/'.$transaction->id,'method'=>'delete','class'=>'delete']) !!}
						{!! Form::hidden('transaction_id', $transaction->id) !!}
						<button class="expensed delete-button">
						<span class="glyphicon glyphicon-remove"></span> Are you sure? YES</button>
					{!! Form::close() !!}
					
					<button class="cancel-button" onclick="confirmDelete({!!$transaction->id!!})"><span class="glyphicon glyphicon-left-arrow" ></span>  Cancel
					</button>
				</div>
			</div>
			<div class="col-md-6 getdetails">
				<a href="/accounting/transactions/{!!$transaction->id!!}">DETAILS</a>
			</div>
		</div>
		
		<hr>	
@include('accounting/transactions/form',["url"=>"/accounting/transactions/".$transaction->id,"method"=>"patch","submit_text"=>"Update"])
			
		</div>
	@endforeach

		</div><!-- /.box-footer -->
	</div><!-- /.box -->    