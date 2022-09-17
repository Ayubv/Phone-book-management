@extends('login_registration_master_layout') 
@section('login_registration_main_content')
<style>
     
   </style>
<main class="signup-form">

    
<div class="cotainer">
<div class="row justify-content-center">
<div class="col-md-4">
<div class="card">
<h3 class="card-header text-center text-white">Register User</h3>
<div class="card-body">
    {!!Form::open(['url'=>'custom-registration','method'=>'POST'])!!}  
{{-- <form action="{{ route('register.custom') }}" method="POST">
@csrf --}}

<div class="form-group mb-3">

  {!! Form::text('name','',['class'=>'form-control']) !!}
{{-- <input type="text" placeholder="Name" id="name" class="form-control" name="name"
required autofocus> --}}
</div>
<div class="form-group mb-3">
    {!! Form::text('username','',['class'=>'form-control']) !!}
{{-- <input type="text" placeholder="Username" id="username" class="form-control" name="username"
required autofocus> --}}


</div>
<div class="form-group mb-3">
    {!! Form::text('email','',['class'=>'form-control']) !!}


{{-- <input type="email" placeholder="Email" id="email_address" class="form-control"
name="email" required autofocus> --}}
{{-- @if ($errors->has('email'))
<span class="text-danger">{{ $errors->first('email') }}</span>
@endif --}}
</div>
<div class="form-group mb-3">
    {!! Form::text('password','',['class'=>'form-control','required']) !!}

{{-- <input type="password" placeholder="Password" id="password" class="form-control"
name="password" required> --}}
{{-- @if ($errors->has('password'))
<span class="text-danger">{{ $errors->first('password') }}</span>
@endif --}}
</div>
<div class="form-group mb-3">
    {!! Form::select('country',$countries,'',['class'=>'form-select','id'=>'country']) !!}
    {{-- <input type="text" placeholder="country" id="country" class="form-control"
    name="country"> --}}
    {{-- @if ($errors->has('country'))
    <span class="text-danger">{{ $errors->first('country') }}</span>
    @endif --}}
    </div>
    <div class="form-group mb-3">
        {!! Form::select('division',[''=>'Select First country'],'',['class'=>'form-select','id'=>'division']) !!}
    {{-- <input type="text" placeholder="Division" id="division" class="form-control"
    name="division"> --}}
    @if ($errors->has('division'))
    <span class="text-danger">{{ $errors->first('division') }}</span>
    @endif
    </div>
    
    <div class="form-group mb-3">
        {!! Form::select('district',[''=>'Select First Division'],'',['class'=>'form-select','id'=>'district']) !!} 
    {{-- <input type="text" placeholder="district" id="district" class="form-control"
    name="district"> --}}
    {{-- @if ($errors->has('district'))
    <span class="text-danger">{{ $errors->first('district') }}</span>
    @endif --}}
    </div>
    <div class="form-group mb-3">
        {!! Form::select('upazila',[''=>'Select First District'],'',['class'=>'form-control','id'=>'upazila']) !!}
    
    {{-- <input type="text" placeholder="upazila" id="upazila" class="form-control"
    name="upazila"> --}}

    </div>
<div class="form-group mb-3">
    {!! Form::text('address','',['class'=>'form-control']) !!}  
{{-- <input type="text" placeholder="address" id="address" class="form-control"
name="address"> --}}
</div>
<div class="form-group mb-3">
<div class="checkbox">
<label class="text-white"><input type="checkbox" name="remember" > Remember Me</label>
</div>
</div>
<div class="d-grid mx-auto">

<button type="submit" class="btn btn-outline-light btn-block">Sign up</button>
<a class="text-center text-white mt-3 mb-3" href="{{url('/login')}}">Have an Account Already? Login Here </a>
</div>
{!!Form::close() !!}
</div>
</div>
</div>
</div>
</div>




</main>


@endsection

@section('footer-scripts')
<script>
    $(document).ready(function(){
        // get Division
        $('#country').on('change',function(){
            country_id=$('#country').val();
            $('#country').after('<span class="text-success">Loading...</span>');
            option ='<option value="">Select Division</option>';
            $.ajax({
                type: "get",
                url: "get-division/"+country_id,
                success: function (response) {
                    if(response.success==true){
                        $.each(response.divisions,function(value,name){
                            option +='<option value="'+value+'">'+name+'</option>';
                        });
                        }else{
                        alert('Something went wrong');
                    }
                    $('#division').html(option);
                    $('#country').next().hide();
                }
            });

        });

        //get division
        $('#division').on('change', function () {
            division_id=$('#division').val();
            $('#division').after('<span class="text-success">Loading...</span>');
            option ='<option value="">Select District</option>';
            $.ajax({
                type: "get",
                url: "get-district/"+division_id,
                success: function (response) {
                    if(response.success==true){
                        $.each(response.districts,function(value,name){
                            option +='<option value="'+value+'">'+name+'</option>';
                     });
                    }else{
                         alert('Something went wrong');
                    }
                    $('#district').html(option);
                    $('#division').next().hide();
                },
                
            });

        });



           // get Upazila
        $('#district').on('change',function(){
            district_id=$('#district').val()
            $('#district').after('<span class="text-success">Loading...</span>');
            option ='<option value="">Select Upazila</option>';
            $.ajax({
                type: "get",
                url: "get-upazila/"+district_id,
                success: function (response) {
                    if(response.success==true){
                        $.each(response.upazilas,function(value,name){
                           option +='<option value="'+value+'">'+name+'</option>';
                        });
                        }else{
                        alert('Something went wrong');
                    }
                    $('#upazila').html(option);
                    $('#district').next().hide();
                }
            });
        });
    });
</script>
@endsection
