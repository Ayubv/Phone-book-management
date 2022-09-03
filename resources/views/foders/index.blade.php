@extends('layouts.admin')
@section('title')
Foders
@endsection
@section('content')
<div class="container">
@include('flash-message');
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header  d-flex justify-content-between">
<div class="w-20">
<h2>This is foder</h2>
</div>
<div>
<a class="btn btn-primary" href="{{url('/foders/create')}}">Add foders</a>
</div>
</div>
<div class="card-body">
<table class="table table-stripped">
<thead>
<tr>
<th>Foders Name</th>
<th>Foders Sell</th>
<th>Foders eat</th>
</tr>
</thead>
<tbody>

@foreach ($foders as $key => $foder)
<tr>

<td>{{$foder->name}}</td>
<td>{{$foder->sell}}</td>
<td>{{$foder->eat}}</td>
<td>
<a class="btn btn-primary" href="{{url('/foders/edit/'.$foder->id)}}">Edit</a>
<a class="btn btn-info" href="{{url('/foders/delete/'.$foder->id)}}">Delete</a>
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