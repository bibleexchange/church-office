@extends('layouts.office')

@section('office-content')

<h1>Attach {{ $resourceName}}</h1>

<div class="row">
	<div class="col-sm-16">

{!! Form::model($Resource, array( 'method' => 'POST')) !!}
  
        {!! Form::hidden('contact_id', $contact->id, array('class' => 'form-control')) !!}

    <div class="form-group">
		
		<select class="form-control" id="address_id" name="address_id">
		
		@foreach($Resource As $a)
		
		<option value="{!!$a->id!!}" ><strong>{!!$a->addressee!!}</strong> - {!!$a->address!!} </option>
			
		@endforeach
		</select>
		
    </div>

    {!! Form::submit('Create Relationship', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}
	</div>
</div>
@stop