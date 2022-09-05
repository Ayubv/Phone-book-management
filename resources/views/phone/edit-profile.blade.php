@extends('layouts.admin')
@section('title')
Users Profile
@endsection
<style>
  body {
      background: rgb(99, 39, 120)
  }
  
  .form-control:focus {
      box-shadow: none;
      border-color: #BA68C8
  }
  
  .profile-button {
      background: rgb(99, 39, 120);
      box-shadow: none;
      border: none
  }
  
  .profile-button:hover {
      background: #682773
  }
  
  .profile-button:focus {
      background: #682773;
      box-shadow: none
  }
  
  .profile-button:active {
      background: #682773;
      box-shadow: none
  }
  
  .back:hover {
      color: #682773;
      cursor: pointer
  }
  
  .labels {
      font-size: 11px
  }
  
  .add-experience:hover {
      background: #BA68C8;
      color: #fff;
      cursor: pointer;
      border: solid 1px #BA68C8
  }
  .labels {
    font-size: 14px;
}
  </style>

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
  

  <form method="post" action="">
  <div class="row">
    {{-- image --}}
  
      
   
      <div class="col-md-3 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            {{-- <input type="file" name="image" id="image" class="form-control">
            <input type="hidden"  name="old_image" id="old_image" value="" class="form-control">
            <img class="rounded-circle" id ="img_preview" src="{{asset($editprofile->image)}}" alt="" style="width: 150px; height: 150px;"> --}}
       </div>
      </div>
        {{-- image --}}
      <div class="col-md-5 border-right">
        {{-- input --}}
          <div class="p-3 py-5">
              <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="text-right">Profile Settings</h4>
              </div>
              <div class="row mt-2">
                  <div class="col-md-6">
                    <label class="labels">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$users->name}}"></div>
                  <div class="col-md-6">
                    <label class="labels">Username</label>
                    <input type="text" class="form-control" name="username" value="{{$users->username}}" >
                  </div>
              </div>
              <div class="row mt-3">
                  
                  <div class="col-md-12">
                    <label class="labels">Email</label>
                    <input type="text" class="form-control" name="email" value="{{$users->email}}" disabled>
                  </div>
                  <div class="col-md-12">
                    <label class="labels">division</label>
                    <input type="text" class="form-control"name="division" value="{{$users->division}}">
                  </div>
                  <div class="col-md-12">
                    <label class="labels">district</label>
                    <input type="text" class="form-control" name="district" value="{{$users->district}}">
                  </div>
                  <div class="col-md-12">
                    <label class="labels">upazela</label>
                    <input type="text" class="form-control" name="upazela"  value="{{$users->upazela}}">
                  </div>
                  <div class="col-md-12">
                    <label class="labels">Union</label>
                    <input type="text" class="form-control" name="uPorisod" value="{{$users->uPorisod}}">
                  </div>
                  <div class="col-md-12">
                    <label class="labels">Mobile Number</label>
                    <input type="text" class="form-control" name="phone_number_one" value="{{$users->phone_number_one}}" disabled>
                  </div>
                  <div class="col-md-12">
                    <label class="labels">description</label>
                    <input type="text" class="form-control" name="description"  value="{{$users->description}}">
                  </div>
                 
              </div>
           
              <div class="mt-5 text-center">
                <button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
          </div>
      
            {{-- input --}}
      </div>
      <div class="col-md-4">
        {{-- experience --}}
          <div class="p-3 py-5">
              <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
              <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
              <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
          </div>
            {{-- experience --}}
      </div>
  </div>
</div>
</div>
</form>

</div>

@endsection