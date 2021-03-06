@extends('app')

@section('content-header')

 <h1>
	Create a New Contact
</h1>

<ol class="breadcrumb">
   <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/person"><i class="fa fa-money"></i> Person</a></li>
   <li class="active">Person</li>
</ol>

@stop

@section('body')

<ul>
	@foreach ($errors->all() AS $e)
	<li>{!! $e	!!}</li>
	@endforeach
</ul>
{!! Form::open(['url' => '/people/create']) !!}

@foreach($columns AS $c)

	<div class="form-group">
        {!! Form::label($c, ucfirst($c)) !!}
        {!! Form::text($c, Input::old($c), array('class' => 'form-control')) !!}
    </div>

@endforeach

    {!! Form::submit('Create the Contact!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}
@stop