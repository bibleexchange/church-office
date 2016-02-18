@extends('layouts.office')

@section('office-content')

<h1>Create a New Contact</h1>

<ul>
	@foreach ($errors->all() AS $e)
	<li>{!! $e	!!}</li>
	@endforeach
</ul>
{!! Form::open(['url' => '/office/contacts']) !!}

@foreach($columns AS $c)

	<div class="form-group">
        {!! Form::label($c, ucfirst($c)) !!}
        {!! Form::text($c, Input::old($c), array('class' => 'form-control')) !!}
    </div>

@endforeach

    {!! Form::submit('Create the Contact!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

@stop