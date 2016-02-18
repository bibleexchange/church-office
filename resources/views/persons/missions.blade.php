@extends('layouts.office')

@section('office-content')

<h1>Missions ({{ $missions->count() }})

<a class="btn btn-xs btn-primary pull-right" href="{{ $formLetterLink }}" target="_blank">Create New Form Letter</a>
</h1>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
			<td>Address</td>
			<td>Amount</td>
        </tr>
    </thead>
    <tbody>

    @foreach($missions AS $mission)
        <tr>
			<td>{{ $mission->id }}</td>
            <td>{{ $mission->fullname }}</td>
			
			<td >
			
			@foreach($mission->addresses AS $a)
			
				{{$a->address}} {{$a->city}}, {{$a->state}} {{$a->zip}}<br> 
			
			@endforeach

			</td>

			<td>$ {{$mission->amount($missions_balance)}}</td>

        </tr>
    @endforeach
    </tbody>
</table>

@foreach($offerings AS $o)
<p>{{$o->name}} <span style="color:green">${{ $o->totalAmount() }}</span></p>
@endforeach

@stop