@extends('layouts.admin')
@section('title')
Users
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
    <a class="btn btn-danger" href="{{url('createUser')}}">Add Users</a>
    </div>
    </div>
</div>

<table class="table table-light table-striped">
<thead class="thead-light">
<tr>
  <th>Name</th>
  <th>E-mail</th>
  <th>Country</th>
  <th>Division</th>
  <th>District</th>
  <th>Upazela</th>
  <th>Status</th>
  <th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($users as $user)
<tr>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->country}}</td>
    <td>{{$user->division}}</td>
    <td>{{$user->district}}</td>
    <td>{{$user->upazila}}</td>
    <td class="text-center">
      <span class="{{$user->status ?'label rounded bg-success px-2':'label rounded bg-warning px-2' }}">{{$user->status ? "Active":"Deactive" }}</span> 
      
      <td class="text-center">
<button type="button" class="{{$user->status ?'btn btn-danger':'btn btn-success' }}"  value="{{$user->status}}" value2="{{$user->id}}" id="changeStatus">{{$user->status ? "Block":"Approve" }}</button> 
{{-- <a class="btn btn-success" href="{{url('users/showusers/'.$user->status)}}">Active</a> --}}


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

@section('footer_scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{asset('/backend/js/axios.min.js')}}"></script>
   
<script>
    
function showUser(){
  
        // axios.get('/showusers',+id)
        // .then((res)=>{

        //     alert('success')
        // console.log(res);

        // })

        // .catch((error)=>{
        //     alert('error')
        // })

}

$(function() {
    $('.toggle-class').change(function() {
        alert('suucees')
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
      
        $.ajax({
            type: "get",
            dataType: "json",
            url: '/shange-status',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })


  $(document).on('click','#changeStatus',function(){
    var  userStatus = $(this).val();
  
      var user_id = $(this).attr('value2')
     




      $.ajax({
            type: "get",
            dataType: "json",
            url: '/change-status/'+userStatus+'/'+user_id,
            data: {'status': userStatus, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });

  });

</script>
@endsection 
