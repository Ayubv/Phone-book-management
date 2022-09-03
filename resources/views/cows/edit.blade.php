@extends('layouts.admin')
@section('title')
Cows
@endsection
@section('content')
<div class="container mt-4">
    <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="card-header  d-flex justify-content-between">
    <div class="w-20">
    <h2>Create Cow</h2>
    </div>
    <div>
    <a class="btn btn-outline-primary" href="{{url('/cows/index')}}">Show All</a>
    </div>
    </div>
    <div class="card-body">
        @include('flash-message')
   
    {!! Form::open(['url'=>'/cows/update/'.$editCow->id, 'method'=>'POST']) !!}   
    
    <div class="form-group">
        {!!Form::label('cowType','Cow Type')!!}
        {!!Form::text('cowType',$editCow->cowType,['class'=>'form-control'])!!}

   
    </div>
    <div class="form-group">
        {!!Form::label('color','Color')!!}
        {!!Form::text('color',$editCow->color,['class'=>'form-control'])!!}

    
    </div>
    <div class="form-group">
        {!!Form::label('age','Age')!!}
        {!!Form::text('age',$editCow->age,['class'=>'form-control'])!!}

    
    </div>
    <div class="form-group">
{!!Form::label('milk','Milk perday')!!}
{!!Form::text('milk',$editCow->milk,['class'=>'form-control'])!!}
    
    </div>
    
    <div class="form-group">
        {!!Form::label('milk_days','milk amount Total day')!!}
        {!!Form::text('milk_days',$editCow->milk_days,['class'=>'form-control'])!!}

 
    </div>
    
    <div class="form-group">
        {!!Form::label('milk_total','Total Milk')!!}
        {!!Form::text('milk_total',$editCow->milk_total,['class'=>'form-control'])!!}
  
    </div>
    
    <div class="form-group">

    {!!Form::label('mark','Mark')!!}
    {!!Form::text('mark',$editCow->mark,['class'=>'form-control'])!!}
   
    </div>
    
    <div class="form-group col-md-12 mb-3 d-flex justify-content-between">
        {!! Form::submit('submit',['class'=>'btn btn-info mt-2'])!!}
        {!! Form::submit('back',['class'=>'btn btn-primary mt-2','url'=>'/cows/index'])!!}
      
    </div>
    {!!Form::close() !!}   
    
    </div>
    </div>
    </div>
    </div>
    </div>
    
    

@endsection