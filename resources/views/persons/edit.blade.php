@extends('app')

@section('body')

<h1>{!!$pageTitle!!}</h1>

<ul>
	@foreach ($errors->all() AS $e)
	<li>{!! $e	!!}</li>
	@endforeach
</ul>

{!! Form::open(array('url' => '/office/contacts')) !!}

@foreach($columns AS $c)

	<div class="form-group">
        {!! Form::label($c, ucfirst($c)) !!}
        {!! Form::text($c, $contact->$c, array('class' => 'form-control')) !!}
    </div>

@endforeach

    {!! Form::submit('save changes', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

<h2>Addresses</h2>

			@foreach($contact->addresses AS $a)
			
				{!!$a->address!!} {!!$a->city!!}, {!!$a->state!!} {!!$a->zip!!}<br> 
			
			@endforeach

<h2>Attach an Address</h2>

{!! Form::open(array('url' => '/office/addresses')) !!}

	<div class="form-group">
        {!! Form::label('address', 'Address') !!}
		{!! Form::select('address', $addresses) !!}
    </div>

    {!! Form::submit('Attach an Address!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}
<br><br>
<a href="/office/address/create">Create a New Address</a>

@stop