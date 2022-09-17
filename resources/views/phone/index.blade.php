@extends('layouts.admin')
@section('title')
Phone
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
@include('flash-message');
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header d-flex justify-content-between">
<div class="w-20">
<h2>This is Phone Book</h2>
</div>
<div>
<a class="btn btn-danger" href="{{url('/phone/create')}}">Add Phone Book</a>
</div>
</div>
<div class="card-body">
<table class="table table-stripped">
<thead>
<tr>
<th>Name</th>
<th>Phone number</th>
<th>Email</th>
<th>Image</th>
<th>Discription</th>
<th>Action</th>


</tr>
</thead>
<tbody>

@foreach ($phones as  $phone)
<tr>

<td>{{$phone->name}}</td>
<td>{{$phone->phone_number_one}}</td>
<td>{{$phone->email}}</td>
{{-- <td>{{$phone->image}}</td> --}}
<td>
    <img src="{{asset($phone->image)}}" alt="" style="width: 50px; height: 50px;">
</td>
<td>{{$phone->description}}</td>



<td>
<a class="btn btn-primary" href="{{url('/phone/edit-phone/'.$phone->id)}}">Edit</a>
<a class="btn btn-info" href="{{url('/phone/delete-phone/'.$phone->id)}}">Delete</a>
</td>


</tr>
@endforeach


</tbody>

</table>
</div>
</div>
</div>
</div>
</div>


@endsection