@extends('layouts.admin')
@section('title')
Create Students
@endsection
@section('content')
<div class="contianer-fluid">
<div class="col-md-6 offset-3">
<div class="card shadow-lg border-0 rounded-lg mt-5">
<div class="card-header">
    <h3 class="text-center font-weight-light my-4 text-primary">Student Manage Forms</h3>
</div>
<div class="card-body">
        <div class="col-md-12 mb-2">
        <div class="mb-3 mb-md-0">  
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control"><br>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control"><br>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control"><br>
        </div>
        </div>
        <div class="mt-4 mb-0">
        <div class="d-grid">
        <button class="btn btn-primary" onclick="createStudent()">Submit</button>
        </div>
        </div>


</div>
<div class="card-footer text-center py-3">
    <div class="lg"><a class="btn btn-danger d-grid" href="{{url('/students/manage')}}">Back</a></div>
</div>
</div>
</div>
</div>
@endsection
@section('footer_scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{asset('/backend/js/axios.min.js')}}"></script>
<script>


function createStudent(){
alert('name');
let name=$('#name').val();
let email=$('#email').val();
let address=$('#address').val();
data = {
name:name,
email:email,
address:address

}
axios.post('/students/store',data)
.then((res)=>{
  

})
.catch((error)=>{
    

})

}






</script>
@endsection 



