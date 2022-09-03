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
<h2>Update category</h2>
</div>
<div>
<a class="btn btn-danger text-right d-inline" href="{{url('catagory/index')}}">Back</a>
</div>
</div>
<div class="card-body">
    @include('layouts.messages')   

{!! Form::open(['url'=>'catagory/update/'.$catagory->id , 'method'=>'POST']) !!}    


<div class="form-group">
{!!Form::label('name','Category Name')!!}
{!!Form::text('name',$catagory->name,['class'=>'form-control'])!!}
@error('name')
<span class="text-danger">{{$message}}</span>
    
 @enderror


</div>
<div class="form-group">
{!!Form::label('type','Category type')!!}
{!!Form::text('type',$catagory->type,['class'=>'form-control'])!!}
@error('type')
<span class="text-danger">{{$message}}</span>
 @enderror

</div>

<div class="form-group">
{!!Form::label('Description','Description')!!}
{!!Form::text('description',$catagory->description,['class'=>'form-control'])!!}  

    @error('description')
    
    <span class="text-danger">{{$message}}</span>
     @enderror
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