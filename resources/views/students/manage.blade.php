@extends('layouts.admin')
@section('title')
This is students manage
@endsection
@section('content')
<div class="container">
@include('flash-message');
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header  d-flex justify-content-between">
<div class="w-20">
<h2>This is student manage</h2>
</div>
<div>
<a class="btn btn-primary" href="{{url('/students/create')}}">Add Students</a>
</div>
</div>
<div class="card-body">
<table class="table table-stripped">
<thead>
<tr>
<th>Students Name</th>
<th>Email</th>
<th>Address</th>
</tr>
</thead>
<tbody>
    <button class="btn btn-danger" onclick="studentList()">All Students</button>

@foreach ($viewStud as $key => $foder)
<tr>

<td>{{$foder->name}}</td>
<td>{{$foder->email}}</td>
<td>{{$foder->address}}</td>
<td>
<a class="btn btn-primary" href="{{url('/students/edit/'.$foder->id)}}">Edit</a>
<a class="btn btn-info" href="{{url('/students/delete/'.$foder->id)}}">Delete</a>
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

@section('footer_scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{asset('/backend/js/axios.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    
function studentList(){
        axios.get('https://jsonplaceholder.typicode.com/users')
        .then((res)=>{
        console.log(res);


        })
        .catch((error)=>{

        })

}



</script>
@endsection 
