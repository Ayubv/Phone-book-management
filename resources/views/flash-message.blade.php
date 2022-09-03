<link rel="stylesheet" href="{{asset('/boots4/css/bootstrap.min.css')}}">
<script src="{{asset('/bots4/js/jquery.slim.min.js')}}"></script>
<script src="{{asset('/bots4/js/popper.min.js')}}"></script>
<script src="{{asset('/bots4/js/bootstrap.bundle.min.js')}}"></script>
@if ($message = Session::get('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">x</span>
    </button>
  </div>
  @endif

{{-- 
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
  
@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>    
    Please check the form below for errors
</div>
@endif --}}