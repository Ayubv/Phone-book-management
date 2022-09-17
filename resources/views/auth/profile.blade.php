@extends('layouts.admin')
@section('title')
Profiles
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
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center text-primary">Users Information</h2>
                </div>
            </div>
            <div class="card-body">
                @include('flash-message');
                {{-- card-body --}}
                {!!Form::open(['url'=>'/update-profile/'.Auth::user()->id,'method'=>'POST','enctype'=>'multipart/form-data'])!!}

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                             {!! Form::label('name','Name :') !!}
                            </div>
                            <div class="col-md-9 mb-2">
                                {!! Form::text('name',Auth::user()->name,['class'=>'form-control']) !!}
                               
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                             {!! Form::label('username','UserName :') !!}
                            </div>
                            <div class="col-md-9 mb-2">
                                {!! Form::text('username',Auth::user()->username,['class'=>'form-control','disabled']) !!}
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                             {!! Form::label('email','Email :') !!}
                            </div>
                            <div class="col-md-9 mb-2">
                                {!! Form::text('email',Auth::user()->email,['class'=>'form-control','disabled']) !!}
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                             {!! Form::label('country','Country :') !!}
                            </div>
                            <div class="col-md-9 mb-2">
                                {!! Form::select('country',$countries,Auth::user()->country?Auth::user()->country:'',['class'=>'form-select','id'=>'country']) !!}
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                             {!! Form::label('division','Division :') !!}
                            </div>
                            <div class="col-md-9 mb-2">
                                {!! Form::select('division',[''=>'Select First Country'],Auth::user()->division?Auth::user()->division:'',['class'=>'form-select','id'=>'division']) !!}
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                             {!! Form::label('district','District :') !!}
                            </div>
                            <div class="col-md-9 mb-2">
                                {!! Form::select('district',[''=>'Select First Division'],Auth::user()->district?Auth::user()->district:'',['class'=>'form-select','id'=>'district']) !!}
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                             {!! Form::label('upazila','Upazela :') !!}
                            </div>
                            <div class="col-md-9 mb-2">
                                {!! Form::select('upazila',[''=>'Select First District'],Auth::user()->upazila?Auth::user()->upazila:'',['class'=>'form-control','id'=>'upazila']) !!}
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                             {!! Form::label('address','Address :') !!}
                            </div>
                            <div class="col-md-9">
                                {!! Form::text('address',Auth::user()->address,['class'=>'form-control']) !!}
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                           <div class="col-md-3">
                           {!! Form::label('image','Upload Your Profile Picture :') !!}
                           </div>
                           <div class="col-md-9">
                            {!! Form::file('image',['class'=>'form-control']) !!}
                            {!! Form::hidden('old_image',Auth::user()->image,['class'=>'form-control']) !!}
                           </div>
                           <div class="row text-center mt-3">
                            <div class="col-md-12">
                                <img class="rounded-circle" id ="img_preview" src="{{Auth::user()->image ? asset(Auth::user()->image):asset('/images/default_profile.jpg')}}" alt="" style="width: 200px; height: 200px;">
                            </div>
                        </div>
                         
                        </div>
                       
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-between">
                        <a class="btn btn-success" href="{{url('dashboard')}}">Back</a>
                        <button type="submit" class="btn btn-primary mybutton">Update</button>
                    </div>
                </div>
                {!!Form::close() !!}
            </div>
             {{-- card body end --}}
        </div>
    </div>
</div>



@endsection
@section('footer_scripts')
<script>
    $(document).ready(function(){
        //Image preview
        $('#image').on('change',function(){
            var reader = new FileReader();
            reader.onload = function(event) {
                $('#img_preview').attr('src', event.target.result)
            }
            reader.readAsDataURL(event.target.files[0]);
        })
        // get Division
        $('#country').on('change',function(){
            country_id=$('#country').val();
            $('#country').after('<span class="text-success">Loading...</span>');
            option ='<option value="">Select Division</option>';
            selected_division_id = "{{Auth::user()->division}}"
            $.ajax({
                type: "get",
                url: "get-division/"+country_id,
                success: function (response) {
                    if(response.success==true){
                        $.each(response.divisions,function(value,name){
                            if(value == selected_division_id){
                                option +='<option value="'+value+'" selected >'+name+'</option>';
                            }
                            else{
                                option +='<option value="'+value+'">'+name+'</option>';
                            }
                        });
                        }else{
                        alert('Something went wrong');
                    }
                    $('#division').html(option);
                    $('#country').next().hide();
                    $('#division').trigger('change');
                }
            });

        });

        $('#country').trigger('change');

        //get division
        $('#division').on('change', function () {
            alert('success')

            division_id=$('#division').val();
    
            $('#division').after('<span class="text-success">Loading...</span>');
            option ='<option value="">Select District</option>';
            selected_district_id = "{{Auth::user()->district}}"
            $.ajax({
                type: "get",
                url: "get-district/"+division_id,
               
                success: function (response) {

                    if(response.success==true){
                        $.each(response.districts,function(value,name){

                            if(value == selected_district_id){
                                option +='<option value="'+value+'" selected >'+name+'</option>';
                            }else{
                                option +='<option value="'+value+'">'+name+'</option>';
                            }
                            

                     });
                        }else{
                        alert('Something went wrong');
                    }
                    $('#district').html(option);
                    $('#division').next().hide();
                    $('#district').trigger('change');

                },
                
            });

        });


           // get Upazila
        $('#district').on('change',function(){
            district_id=$('#district').val()
            $('#district').after('<span class="text-success">Loading...</span>');
            option ='<option value="">Select Upazila</option>';
            selected_upzila_id = "{{Auth::user()->upazila}}" 
            $.ajax({
                type: "get",
                url: "get-upazila/"+district_id,
                success: function (response) {
                    if(response.success==true){
                        $.each(response.upazilas,function(value,name){
                            if(value == selected_upzila_id){
                                option +='<option value="'+value+'" selected>'+name+'</option>';

                            }else{
                                option +='<option value="'+value+'">'+name+'</option>';
                            }

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