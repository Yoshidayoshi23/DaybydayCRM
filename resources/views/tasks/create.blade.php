@extends('layouts.master')
@section('heading')
<h1>Create task</h1>
@stop

@section('content')

{!! Form::open([
        'route' => 'tasks.store'
        ]) !!}

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-inline">
 <div class="form-group col-sm-6 removeleft ">
        {!! Form::label('deadline', 'Deadline:', ['class' => 'control-label']) !!}
    {!! Form::date('deadline', \Carbon\Carbon::now()->addDays(3), ['class' => 'form-control']) !!}
    </div>

<div class="form-group col-sm-6 removeleft removeright">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    {!! Form::select('status', array(
    '1' => 'Open', '2' => 'Completed'), null, ['class' => 'form-control'] )
 !!}
 </div>

</div>
    <div class="form-group form-inline">
{!! Form::label('fk_user_id_assign', ' Assign User:', ['class' => 'control-label']) !!}
{!! Form::select('fk_user_id_assign', $users, null, ['class' => 'form-control']) !!}
 @if(Request::get('client') != "")
 {!! Form::hidden('fk_client_id', Request::get('client')) !!}
 @else
{!! Form::label('fk_client_id', 'Assign Client:', ['class' => 'control-label']) !!}
{!! Form::select('fk_client_id', $clients, null, ['class' => 'form-control']) !!}
@endif
</div>

  
    

</div>

{!! Form::submit('Create New Task', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}





@stop