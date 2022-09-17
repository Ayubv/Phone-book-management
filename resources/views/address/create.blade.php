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
               
                    {!! Form::open(['url'=>'/address/store','method'=>'POST']) !!}
                   
                        <div class="col-md-12 mb-2">
                            <div class="mb-3 mb-md-0">
                                {!! Form::label('name','Name') !!}
                                {!! Form::text('name','',['class'=>'form-control','placeholder'=>'name']) !!}

                            </div>
                        </div>
                     
                        <div class="col-md-12 mb-2">
                            <div>
                                {!! Form::label('country','country') !!}
                                {!! Form::select('country',$countries,'',['class'=>'form-select','id'=>'country']) !!}
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div>
                                {!! Form::label('Division','Division') !!}
                                {!! Form::select('division',[''=>'Select  country First'],'',['class'=>'form-select','id'=>'division']) !!}
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div>
                                {!! Form::label('District','District') !!}
                                {!! Form::select('district',[''=>'Select division First'],'',['class'=>'form-select','id'=>'district']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div>
                                {!! Form::label('Upazila','Upazila') !!}
                                {!! Form::select('upazila',[''=>'Select  district First'],'',['class'=>'form-select','id'=>'upazila']) !!}
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



