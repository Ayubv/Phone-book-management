@extends('layouts.admin')
@section('title')
Category
@endsection
<style>
    input, button, select, optgroup, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    border: none;
    float: right;
    background: none;
}
</style>
@section('content')
<div class="container">
    @include('layouts\messages')
<div class="card">
<div class="card-header  d-flex justify-content-between">
<div class="w-75">
<h2>This is category</h2>
</div>
<div class="w-20">
<a class="btn btn-danger" href="{{url('catagory/create')}}">Add Category</a>
</div>
</div>
</div>

<table class="table table-light table-striped">
<thead class="thead-light">
<tr>
<th>Name</th>
<th>Type</th>
<th>Description</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach ( $catagory as $cat )
<tr>
<td>{{$cat->name}}</td>
<td>{{$cat->type}}</td>
<td>{{$cat->description}}</td>
<td>
<a href="{{url('catagory/edit/'.$cat->id)}}" class="btn btn-info">Edit</a>
<a href="{{url('catagory/delete/'.$cat->id)}}" class="btn btn-danger">Delete</a>
</td>
</tr>
@endforeach

</tbody>
</table>
</div>
@endsection