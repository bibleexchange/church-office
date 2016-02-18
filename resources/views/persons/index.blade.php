@extends('app')

@section('body')

<h1>All the Contacts ({{ $Resource->count() }})
<a class="btn btn-xs btn-primary pull-right" href="{{ URL::to('/people/create') }}">New</a>
</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
			<td>Address</td>
			<td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($Resource AS $key => $value)
        <tr>
			<td>{{ $value->id }}</td>
            <td>{{ $value->firstname }}</td>
            <td width="20%">{{ $value->lastname }}</td>
			
			<?php
			$addresses = \App\Contact::find($value->id)->addresses;
			?>
			
			<td >
			
			@foreach($addresses AS $a)
			
				{{$a->address}} {{$a->city}}, {{$a->state}} {{$a->zip}}<br> 
			
			@endforeach

				

			</td>
            <!-- we will also add show, edit, and delete buttons -->

			<td>
                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <a class="btn btn-xs btn-success" href="{{ URL::to('/people/' . $value->id) }}">Show</a>

                <a class="btn btn-xs btn-info" href="{{ URL::to('/people/' . $value->id . '/edit') }}">Edit</a>
				
				<a class="btn btn-xs btn-warning" href="{{ URL::to('/people/' . $value->id . '/attach/address') }}">Address</a>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>

<!--temporary-->
<?php
$doc = '';

foreach($Resource AS $key => $value){

$doc .=  $value->lastname.', '. $value->firstname .' <br>';
			
$addresses = \App\Contact::find($value->id)->addresses;
			
			foreach($addresses AS $a){
			
				$doc .=  '<span style="margin-left:30px;"></span>'.$a->address. ' ' . $a->city.', '.$a->state. ' '. $a->zip . '<br>';
			
			}
			$doc .= '<hr>';
}

//file_put_contents('addresses',$doc);

?>
<!--temporary END-->

@stop