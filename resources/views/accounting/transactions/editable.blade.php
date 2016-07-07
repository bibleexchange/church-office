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
			
			
<div id="accordion" role="tablist" aria-multiselectable="true">
			
<?php $date = null; $hr = ""; ?>

	@foreach($transactions AS $transaction)
		
		<?php 
		if($date == $transaction->date){
			$hr = "";
		}else{
			$date = $transaction->date;
			$hr = "<div class='date-break'>" . $transaction->present()->date ."</div>";
		}
		
		 ?>
	
	{!! $hr !!}
	
	  <div class="panel panel-success">
		<div class="panel-heading" role="tab" id="heading{{$transaction->id}}">
		  <h4 class="panel-title">
			<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$transaction->id}}" aria-expanded="false" aria-controls="collapse{{$transaction->id}}">  
					<div class="expensed button"><span class="glyphicon glyphicon-edit"></span></div>
					<div class="expensed spacer"></div>
					<div class="expensed payer">$ {{$transaction->from->name}}</div>
					<div class="expensed spacer"><span class="glyphicon glyphicon-hand-right pull-right" aria-hidden="true"></span></div>
					<div class="expensed payer">{{$transaction->to->name}}</div>
					<div class="expensed spacer"></div>
					<div class="expensed details">{{$transaction->seriel}} - {{$transaction->category->name}} - {{$transaction->memo}}</div>
					<div class="expensed amount">{{$transaction->amount}}</div>
			</a>
		  </h4>
		</div>
		<div id="collapse{{$transaction->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$transaction->id}}">

		<!-- -->
		 <div id="edit-{{$transaction->id}}" class="edit-transaction">
		 
			 <div class="row">
				<div class="col-sm-6">
					@include('accounting/parts/confirm-delete')
				</div>
				<div class="col-sm-6">
					<a class="btn btn-primary" style="width:100%; line-height:40px;" href="/accounting/transactions/{!!$transaction->id!!}">DETAILS</a>
				</div>
			</div>
			

	
@include('accounting/transactions/form',["url"=>"/accounting/transactions/".$transaction->id,"method"=>"patch","submit_text"=>"Update"])
			
		</div>
		<!-- -->
		</div>
	  </div>
	
	@endforeach
</div><!-- /.accordion -->
		</div><!-- /.box-footer -->
	</div><!-- /.box -->    