@extends('layouts.admin')
@section('title')
Cows
@endsection
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header d-flex justify-content-between">
<div class="w-20">
<h2>Create Cow</h2>
</div>
<div>
<a class="btn btn-primary" href="{{url('/cows/index')}}">Show All</a>
</div>
</div>
<div class="card-body ">
{!! Form::open(['url'=>'/cows/store', 'method'=>'POST']) !!}     

<div class="form-group mb-3">
    {!!Form::label('cowType','Cow Type')!!}
    {!!Form::text('cowType','',['class'=>'form-control'])!!}
</div>
<div class="form-group mb-3">
    {!!Form::label('color','Color')!!}
    {!!Form::text('color','',['class'=>'form-control'])!!}

</div>
<div class="form-group mb-3">
    {!!Form::label('age','Age')!!}
    {!!Form::text('age','',['class'=>'form-control'])!!}


</div>
<div class="form-group mb-3">
{!!Form::label('milk','Milk perday')!!}
{!!Form::text('milk','',['class'=>'form-control'])!!}

</div>

<div class="form-group mb-3">
    {!!Form::label('milk_days','milk amount Total day')!!}
    {!!Form::text('milk_days','',['class'=>'form-control'])!!}
    



</div>

<div class="form-group mb-3">

    {!!Form::label('milk_total','Total Milk')!!}
    {!!Form::text('milk_total','',['class'=>'form-control'])!!}
    

</div>

<div class="form-group mb-3">

    {!!Form::label('mark','Mark')!!}
    {!!Form::text('mark','',['class'=>'form-control'])!!}


</div>

<div class="form-group mb-3 d-flex justify-content-between">
    {!! Form::submit('submit',['class'=>'btn btn-info mt-2'])!!}
    {!! Form::submit('back',['class'=>'btn btn-primary mt-2','url'=>'/cows/index'])!!}
    {{-- {!! Form::button('Back',['class'=>'btn btn-danger'])!!} --}}
</div>

{!!Form::close() !!}   


</div>
</div>
</div>
</div>
</div>


@endsection