@extends('layouts.admin')
@section('title')
Users Address
@endsection
@section('content')
<main>
<div class="container-fluid px-4">
<div class="card">
<div class="card-header d-flex justify-content-between">
<div class="w-75">
<h2>This is Users list</h2>
</div>
<div class="w-20">
<a class="btn btn-danger" href="{{url('address/create')}}">Add Users Address</a>
</div>
</div>
</div>

<table class="table table-light table-striped">
<thead class="thead-light">
<tr>
<th>Name</th>
<th>Country</th>
<th>Division</th>
<th>District</th>
<th>Upazela</th>

<th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($address as $addr)
<tr>
<td>{{$addr->name}}</td>
<td>{{$addr->country_name}}</td>
<td>{{$addr->division_name}}</td>
<td>{{$addr->district_name}}</td>
<td>{{$addr->upazila_name}}</td>

<td>

<a class="btn btn-danger" href="{{url('address/edit/'.$addr->id)}}">Edit</a>
<a class="btn btn-success" href="{{url('address/delete/'.$addr->id)}}">Delete</a>
</td>
</tr>
@endforeach
<tr>
<td></td>
</tr>
</tbody>
</table>
</div>
</main>
<footer class="py-4 bg-light mt-auto">
<div class="container-fluid px-4">
<div class="d-flex align-items-center justify-content-between small">
<div class="text-muted">Copyright &copy; Your Website 2022</div>
<div>
<a href="#">Privacy Policy</a>
&middot;
<a href="#">Terms &amp; Conditions</a>
</div>
</div>
</div>
</footer>
@endsection

