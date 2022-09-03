@extends('layouts.admin')
@section('title')
Cows
@endsection
@section('content')
<div class="container mt-4">
@include('flash-message');  
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header d-flex justify-content-between">
<div class="w-20">
<h2>This is foder</h2>
</div>
<div>
<a class="btn btn-danger" href="{{url('/cows/create')}}">Add Cows</a>
</div>
</div>
<div class="card-body">
<table class="table table-stripped">
<thead>
<tr>
<th>Cow Type</th>
<th>Color</th>
<th>Age</th>
<th>Milk perday</th>
<th>milk amount Total day</th>
<th>Total Milk</th>
<th>Mark</th>

</tr>
</thead>
<tbody>

@foreach ($cows as  $cow)
<tr>

<td>{{$cow->cowType}}</td>
<td>{{$cow->color}}</td>
<td>{{$cow->age}}</td>
<td>{{$cow->milk}}</td>
<td>{{$cow->milk_days}}</td>
<td>{{$cow->milk_total}}</td>
<td>{{$cow->mark}}</td>
<td>
<a class="btn btn-primary" href="{{url('/cows/edit/'.$cow->id)}}">Edit</a>
<a class="btn btn-info" href="{{url('/cows/delete/'.$cow->id)}}">Delete</a>
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