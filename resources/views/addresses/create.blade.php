@extends('app')

@section('content-header')

 <h1>
	Create a New Address
</h1>

<ol class="breadcrumb">
   <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/person"><i class="fa fa-money"></i> address</a></li>
   <li class="active">Address</li>
</ol>

@stop

@section('body')

<ul>
	@foreach ($errors->all() AS $e)
	<li>{!! $e	!!}</li>
	@endforeach
</ul>
{!! Form::open(['url' => '/address']) !!}

@foreach($columns AS $c)

	<div class="form-group">
        {!! Form::label($c, ucfirst($c)) !!}
        {!! Form::text($c, Input::old($c), array('class' => 'form-control')) !!}
    </div>

@endforeach

    {!! Form::submit('Create the Address!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}
@stop