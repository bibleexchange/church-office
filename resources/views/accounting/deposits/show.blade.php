@extends('app')

@section('body')
	
	@include('accounting.parts.deposit_slip')
	
	<a href="/accounting/deposits/{{$deposit->id}}/print" target="_blank">print</a>
	
	<hr>
	
	<div id="offering-list">
		<h2>{{$deposit->offerings->count()}} Offerings</h2>
		
		<p>
		{{--
		@foreach($deposit->offerings as $offering)
			<a href="#{{$offering->name}}">{{ $offering->name }} <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></a> | 
		@endforeach
		--}}
		</p>
		
		@include('accounting.parts.create_offering', ['deposits'=>$deposits, 'deposit'=>$deposit])	
	</div>
	<hr>
	
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	
	<?php $i = 0;
	?>
	
	@foreach($deposit->offerings()->orderBy('id','DESC')->get() as $offering)
	
	<?php

		if ($i >= 1)
		{
			$collapse = 'collapse';
			$collapse_class = 'collapsed';
		}else {
			$collapse = 'collapse in';
			$collapse_class = '';
		}
		
		$i++;
		
	?>
	
	<span id ="{{$offering->name}}"></span>
	
	<div id="offering-panels" class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$offering->id}}" aria-expanded="true" aria-controls="collapseOne" class="{{$collapse_class}}">
          ({{ $offering->name }}) <strong>${{ $offering->totalAmount() }}</strong>
        </a>
		
	  	 <a href="/accounting/gifts/create?offering_id={{$offering->id}}" class="pull-right"><span class="glyphicon glyphicon-plus"></span></a>

	  	</div>
	  
	  <div id="collapse{{$offering->id}}" class="panel-collapse {{$collapse}}" role="tabpanel" aria-labelledby="headingOne">
	  
		   <!-- Table -->
		  <table class="table">
			<thead>
			  <tr>
			  
				<th>$</th>
				<th  colspan="3">Giver</th>
				<th></th>
				 <th colspan="2">Memo</th>
			  </tr>
			</thead>
			<tbody>

			@foreach ($offering->gifts AS $gift)
			  <tr>
				<th scope="row">${{ $gift->totalAmount }}</th>  
				<td colspan="2">{{ $gift->contact->fullName }}</td>
				<td colspan="2">{{ $gift->memo }}</td>
				<th><a data-toggle="modal" href="#myModal{{$gift->id}}" class="btn btn-info btn-sm">edit</a>
				</th>  
			  </tr>

	<!-- Modal -->
	  <div class="modal edit-gift fade in" id="myModal{{$gift->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close ion-close-circled" data-dismiss="modal" aria-hidden="true"></button>
			  <h4 class="modal-title">(${{$gift->totalAmount}}) {{$gift->contact->fullName}}</h4>
			</div>
			<div class="modal-body">

		   @include('accounting.parts.create_gift_simple')
	 
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			 </div>
		  </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	  </div><!-- /.modal -->
			  
			@endforeach
			<tr style="background-color:rgba(0, 174, 218,.5);"><th colspan="7"></th></tr>

			@include('accounting.parts.create_gift')
			
			</tbody>
		  </table>
	  </div>
	</div><!-- end of individual panel -->
	@endforeach
</div> <!-- end of offering panels group -->

@stop

@section('scripts-1')

<script>
		var data = [
		
		@foreach($givers AS $giver)
			{ value: "{{$giver->id}}", label: "{{$giver->fullName}}" },
		@endforeach
			{ value: "", label: "" }
		];
		
		$(function() {
			
			$("input[id^='giver_'").autocomplete({
				source: data,
				focus: function(event, ui) {
					// prevent autocomplete from updating the textbox
					event.preventDefault();
					// manually update the textbox
					$(this).val(ui.item.label);
				},
				
				appendTo: 'div[id^="#my-suggestions_"',
				
				select: function(event, ui) {
					// prevent autocomplete from updating the textbox
					event.preventDefault();
					// manually update the textbox and hidden field
					$(this).val(ui.item.label);
					$("input[id^='giverid_'").val(ui.item.value);
				}
			});
		});
	</script>
@stop
@section('scripts')	
		<script>
	$('table#deposit_slip').readmore({
	  speed: 75,
	  lessLink: '<a href="#">Read less</a>'
	});
	
	$('#offering-list').readmore({
	  speed: 75,
	  lessLink: '<a href="#">hide form</a>',
	  moreLink: '<a href="#">Create New</a>',
	  collapsedHeight: 85
	});
	
	$(".reset").click(function() {
		event.preventDefault();
	  $('input[type=text]').each(function(){
		 $(this).val('');
	  });
	});
	
	</script>
	
@stop