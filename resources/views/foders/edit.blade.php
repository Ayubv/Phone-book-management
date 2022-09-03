@extends('layouts.admin')
@section('title')
Foders
@endsection
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header d-flex justify-content-between">
<div class="w-20">
<h2>Update foder</h2>
</div>
<div>
<a class="btn btn-primary" href="{{url('/foders/index')}}">Show All</a>
</div>
</div>
<div class="card-body">
{{-- <form action="{{url('/foders/update/'.$editFoders->id)}}" method="post"> --}}
{!! Form::open(['url'=>'/foders/update/'.$editFoders->id, 'method'=>'POST']) !!}    
<div class="form-group">
{!!Form::label('name','Foder Name')!!}
{!!Form::text('name',$editFoders->name,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('sell','Foder sell')!!}
{!!Form::text('sell',$editFoders->sell,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('eat','Foder eat')!!}
{!!Form::text('eat',$editFoders->eat,['class'=>'form-control'])!!}
</div>
<div class="form-group col-md-12 mb-3 d-flex justify-content-between">
{!! Form::submit('submit',['class'=>'btn btn-info mt-2'])!!}
</div>
{!!Form::close() !!}   
</div>
</div>
</div>
</div>
</div>
@endsection