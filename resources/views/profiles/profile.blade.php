@extends('layouts.admin')
@section('title')
Profile
@endsection
@section('content')
<div class="container">
<div class="col-md-6 offset-3">
<div class="card">
<div class="card-header mt-4">
<h3 class="text-center">User Details Information</h3>
</div>
<div class="card-body">
@if(Auth::check())
<p>name: {{Auth::user()->name}}</p><br>
<p>Username: {{Auth::user()->username}}</p><br>
<p>Email: {{Auth::user()->email}}</p><br>
<p>Division: {{Auth::user()->division}}</p><br>
<p>District: {{Auth::user()->district}}</p><br>
<p>Upazela: {{Auth::user()->upazela}}</p><br>
<p>Union: {{Auth::user()->uPorisod}}</p><br>
@endif
</div>
</div>
</div>
</div>
@endsection