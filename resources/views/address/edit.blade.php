@extends('layouts.admin')
@section('title')
Address
@endsection
@section('content')
<div class="container">
    <div class="col-md-6  offset-3">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Users Address</h3>
            </div>
            <div class="card-body">
               
                    {!! Form::open(['url'=>'/address/update/'.$editAddress->id,'method'=>'POST']) !!}
                   
                        <div class="col-md-12 mb-2">
                            <div class="mb-3 mb-md-0">
                                {!! Form::label('name','Name') !!}
                                {!! Form::text('name',$editAddress->name,['class'=>'form-control','placeholder'=>'name']) !!}

                            </div>
                        </div>
                     
                        <div class="col-md-12 mb-2">
                            <div>
                                {!! Form::label('country','country') !!}
                                {!! Form::select('country',$countries,$editAddress->country?$editAddress->country:'',['class'=>'form-select','id'=>'country']) !!}
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div>
                                {!! Form::label('Division','Division') !!}
                                {!! Form::select('division',[''=>'Select  country First'],$editAddress->division?$editAddress->division:'',['class'=>'form-select','id'=>'division']) !!}
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div>
                                {!! Form::label('District','District') !!}
                                {!! Form::select('district',[''=>'Select division First'],$editAddress->district?$editAddress->district:'',['class'=>'form-select','id'=>'district']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div>
                                {!! Form::label('Upazila','Upazila') !!}
                                {!! Form::select('upazila',[''=>'Select  district First'],$editAddress->upazila?$editAddress->upazila:'',['class'=>'form-select','id'=>'upazila']) !!}
                            </div>
                            
                        </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
              
            </div>
            <div class="card-footer text-center py-3">
                <div class="lg"><a class="btn btn-danger d-grid" href="{{url('address/index')}}">Back</a></div>
            </div>
        </div>
    </div> 
</div>
@endsection
@section('footer_scripts')
<script>
    $(document).ready(function(){
       
        // get Division
        $('#country').on('change',function(){
        
            country_id=$('#country').val();
            $('#country').after('<span class="text-success">Loading...</span>');
            option ='<option value="">Select Division</option>';
            selected_division_id = "{{$editAddress->division}}"
            $.ajax({
                type: "get",
                url: "/get-division/"+country_id,
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

            division_id=$('#division').val();
    
            $('#division').after('<span class="text-success">Loading...</span>');
            option ='<option value="">Select District</option>';
            selected_district_id = "{{$editAddress->district}}"
            $.ajax({
                type: "get",
                url: "/get-district/"+division_id,
               
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
            selected_upzila_id = "{{$editAddress->upazila}}" 
            $.ajax({
                type: "get",
                url: "/get-upazila/"+district_id,
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