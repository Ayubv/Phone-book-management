@extends('layouts.admin')
@section('title')
    Create phone book
@endsection
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create phone book</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/phone/store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="name">Name : </label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="phone_number_one">Phone number one :</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="phone_number_one" id="phone_number_one" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="email">Email :</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                        </div>

                        <div class="row align-items-center mb-3">
                            <div class="col-md-3">
                                <label for="image">Image :</label>
                            </div>
                            <div class="col-md-7">
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <img class="rounded-circle" id ="img_preview" src="{{asset('/images/default_profile.jpg')}}" alt="" style="width: 150px; height: 150px;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="description">Description :</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="description" id="description" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 d-flex justify-content-between">
                                <button class="btn btn-light"><a href="{{url('/phone/index')}}">Back</a></button>
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
<script>
    $(document).ready(function(){
        $('#image').on('change',function(){
            var reader = new FileReader();
            reader.onload = function(event) {
                $('#img_preview').attr('src', event.target.result)
            }
            reader.readAsDataURL(event.target.files[0]);
        })
    });
</script>
@endsection