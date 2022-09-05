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
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="text-primary text-center">Users All Information</h2>
                </div>
               
            </div>
            <div class="card-body">
                <table class="table table-light table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Division</th>
                            <th>District</th>
                            <th>Upazela</th>
                            <th>Union</th>
                            <th>Phone number</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $phones as $phone )
                        <tr>
                            <td>{{$phone->name}}</td>
                            <td>{{$phone->username}}</td>
                            <td>{{$phone->email}}
            
                            </td>
                            <td>{{$phone->division}}</td>
                            <td>{{$phone->district}}</td>
                            <td>{{$phone->upazela}}</td>
                            <td>{{$phone->uPorisod}}</td>
                            <td>{{$phone->phone_number_one}}</td>
                            <td>
                              <img src="{{asset($phone->image)}}" alt="" width="100" height="100">
                            </td>
                            <td>{{$phone->description}}</td>
                            <td>
                              <a class="btn btn-danger" href="{{url('/phone/edit-profile/'.$phone->id)}}">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              
            </div>
        </div>
    </div>
</div>


@endsection