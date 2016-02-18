 {!! Form::open(array('url'=>'/accounting/offerings', 'class'=>'well form-inline','role'=>'form','id'=>'gifts')) !!}
<h2>+ New Offering</h2>
<div class="form-group">
{!! Form::hidden('deposit_id', $deposit->id) !!}
</div>
<div class="form-group">
{!! Form::label('name','Name') !!}
{!! Form::text('name') !!}
</div>

<div class="form-group">
{!! Form::label('created_at','Date') !!}
{!! Form::text('created_at', Carbon::now()) !!}
</div>

<div class="form-group">
{!! Form::label('memo','Memo') !!}
{!! Form::text('memo', NULL, array('class'=>'', 'placeholder'=>'memo')) !!}
</div>
{!! Form::submit('create', array('class'=>'btn'))!!}

{!! Form::close() !!}