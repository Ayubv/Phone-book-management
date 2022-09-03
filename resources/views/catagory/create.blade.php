@extends('layouts.admin')
@section('title')
Category
@endsection
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header  d-flex justify-content-between">
<div class="w-20">
<h2>This is category insert page</h2>
</div>
<div>
<a class="btn btn-danger text-right d-inline" href="{{url('catagory/index')}}">Back</a>
</div>
</div>
<div class="card-body">
@include('layouts.messages')  
{!! Form::open(['url'=>'catagory/create', 'method'=>'POST']) !!}   
@if(Session::has('success'))
<p style="color:red">{{Session::get('success')}}</p>
@endif
@if(Session::has('fail'))
<p style="color:green">{{Session::get('fail')}}</p>
@endif

<div class="form-group">
{!!Form::label('name','Category Name')!!}
{!!Form::text('name','',['class'=>'form-control'])!!}
<span class="text-danger">@error('name'){{$message}}@enderror</span>
</div>


<div class="form-group">
{!!Form::label('type','Category type')!!}
{!!Form::text('type','',['class'=>'form-control'])!!}

<span class="text-danger">@error('type'){{$message}}@enderror</span>
</div>
<div class="form-group">
{!!Form::label('Description','Description')!!}
{!!Form::text('description','',['class'=>'form-control'])!!}
<span class="text-danger">@error('description'){{$message}}@enderror</span>
</div>


<div class="form-group col-md-12 mb-3 d-flex justify-content-between">
    {!! Form::submit('submit',['class'=>'btn btn-info'])!!}
    {{-- {!! Form::button('Back',['class'=>'btn btn-danger'])!!} --}}
</div>
{!!Form::close() !!}   
</div>
</div>

</div>

</div>
@endsection