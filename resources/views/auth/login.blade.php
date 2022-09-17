@extends('login_registration_master_layout') 
@section('login_registration_main_content')
<main class="login-form">
<div class="cotainer">
<div id="particles-js"></div>
<div class="row justify-content-center">
<div class="col-md-4">
<div class="card">
<h3 class="card-header text-center text-white">Login</h3>
<div class="card-body">
<form method="POST" action="{{ route('login.custom') }}">
@csrf
<div class="form-group mb-3">
<input type="email" placeholder="Email" id="email" class="form-control" name="email" required/><span><i class="fa fa-envelope"></i></span>
@if ($errors->has('email'))
<span class="text-danger">{{ $errors->first('email') }}</span>
@endif
</div>
<div class="form-group mb-3">
<input type="password" placeholder="Password" id="password" class="form-control" name="password" required><span><i class="fa fa-key" aria-hidden="true"></i></span>
@if ($errors->has('password'))
<span class="text-danger">{{ $errors->first('password') }}</span>
@endif
</div>
<div class="form-group mb-3">
<div class="checkbox">
<label class="text-white">
<input type="checkbox" name="remember"> Remember Me
</label>
</div>
</div>
<div class="d-grid mx-auto">
<button type="submit" class="btn btn-outline-light btn-block">Signin</button>

<a class="text-center text-white mt-3 mb-3" href="{{url('/registration')}}">Not register? Register here </a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

</main>
@endsection