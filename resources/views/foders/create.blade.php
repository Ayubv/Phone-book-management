@extends('layouts.admin')
@section('title')
Foders
@endsection
@section('content')
<div class="container">

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header  d-flex justify-content-between">
<div class="w-20">
<h2>Create foder</h2>
</div>
<div>
<a class="btn btn-info" href="{{url('/foders/index')}}">Show All</a>
</div>
</div>
<div class="card-body">
 {!! Form::open(['url'=>'/foders/store', 'method'=>'POST']) !!}     
<div class="form-group">
{!!Form::label('name','Foder Name')!!}
{!!Form::text('name','',['class'=>'form-control'])!!}
<span class="text-danger">@error('name'){{$message}}@enderror</span>
</div>
<div class="form-group">
{!!Form::label('sell','Foder sell')!!}
{!!Form::text('sell','',['class'=>'form-control'])!!}
<span class="text-danger">@error('sell'){{$message}}@enderror</span>
</div>
<div class="form-group">
{!!Form::label('eat','Foder eat')!!}
{!!Form::text('eat','',['class'=>'form-control'])!!}
<span class="text-danger">@error('eat'){{$message}}@enderror</span>
</div>
<div class="form-group col-md-12 mb-3 d-flex justify-content-between">
    {!! Form::submit('submit',['class'=>'btn btn-info mt-2'])!!}
    {!! Form::submit('back',['class'=>'btn btn-dark mt-2']) !!}
    {{-- {!! Form::button('Back',['class'=>'btn btn-danger'])!!} --}}
</div>
{!!Form::close() !!}   

</div>
</div>
</div>
</div>
</div>
@endsection