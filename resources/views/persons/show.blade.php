@extends('app')

@section('body')

<h1>{!!$pageTitle!!}</h1>

<a href="/people">back</a>

{!! Form::open(array('route' => 'people.date-range')) !!}
<p>
@foreach($columns AS $c)

        {!! $c !!}, 

@endforeach
</p>

<h2>Addresses</h2>
	@foreach($addresses AS $a)
	
		{!! $a->address !!} {!!$a->city!!}, {!!$a->state!!} {!!$a->zip!!}<br> 
	
	@endforeach

<h3>Select Range (2 dates, start and end)</h3>

</tr>
	{!! Form::open(['route'=>'people.date-range']) !!}
		
		{!! Form::hidden('contact_id',$contact->id) !!}
		
		<select class="date-select form-control" name="start">
			@foreach($datesFromRangeArray AS $date)
		  	<option value="{{$date}}">{{$date}}</option>
		  	@endforeach
		</select>

		
		<select class="date-select2 form-control" name="end">
			@foreach($datesFromRangeArray AS $date)
		  	<option value="{{$date}}">{{$date}}</option>
		  @endforeach
		</select>
		
		{!! Form::submit() !!}
		
	{!! Form::close() !!}
	
<h2>Donations (${{ $sumOfGifts }})</h2>

<p>
	<a href="?">all time</a> | 
	<a href="?range_start=2013-01-01&&range_end=2013-12-31">2013</a> | 
	<a href="?range_start=2014-01-01&&range_end=2014-12-31">2014</a> | 
	<a href="?range_start=2015-01-01&&range_end=2015-12-31">2015</a> | 
</p>

	<table>
		<tr>
			<th>Amount</th>
			<td>date</td>
			<th>Offering</th>
		</tr>
	@foreach($gifts AS $gift)
		<tr>
			<td>${!! number_format($gift->totalAmount,'2') !!} </td>
			<td>{{ $gift->created_at	}} </td>
			<td>{{ $gift->offering->name }} </td>
		</tr>
	@endforeach
	</table>
@stop

@section('scripts')
			<script type="text/javascript">
			$(document).ready(function() {
				  $(".date-select").select2();
				});

			$(document).ready(function() {
				  $(".date-select2").select2();
				});
			</script>
@stop