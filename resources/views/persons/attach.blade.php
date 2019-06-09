@extends('app')

@section('content-header')

 <h1>
	Attach {{ $resourceName}}
</h1>

<ol class="breadcrumb">
   <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/person"><i class="fa fa-money"></i> Person</a></li>
   <li class="active">Person</li>
</ol>

@stop

@section('body')

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