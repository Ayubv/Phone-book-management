<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Document</title>
{{-- bootstrap --}}
<link href="{{asset('/backend/css/styles.css')}}" rel="stylesheet" />
<link href="select2.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery.js"></script>      
<script type="text/javascript" src="{{asset('/select2/dist/js/select2.min.js')}} "></script>     

<style>
body{
margin:0;
padding: 0;
overflow: hidden;
}
#particles-js{
background:#0c0b33;


}

main.login-form {
position: absolute;
width: 100%;
top: 20%;
}
.signup-form{
position: absolute;
width: 100%;
top:3%;

}
.card {

background-color:#040530ab ;

}
.form-control, .dataTable-input {

background: transparent;
}

svg.svg-inline--fa.fa-envelope {
    color: #dacdcd;
    position: absolute;
    top: 78px;
    left: 376px;
    right: 0;
}

svg.svg-inline--fa.fa-key {
    position: absolute;
    top: 132px;
    left: 381px;
    bottom: 0;
    right: 0;
    color: #b6aeae;
}

</style>

</head>
<body>



<div class="conatiner">
<div id="particles-js"></div>
<div class="row vh-100 justify-content-center align-items-center">
<div class="col-md-12">
@yield('login_registration_main_content')
</div>
</div>
</div>
<canvas class="background"></canvas>
<script src="{{asset('backend/js/jquery.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/js/all.js')}}"></script>

<script type="text/javascript" src="{{asset('/particles/js/particles.js')}}"></script>
<script type="text/javascript" src="{{asset('/particles/js/app.js')}}"></script>
<script>
    $(document).ready(function() {   
      $("#getCountry").select2();   
    });      
  </script>   
</body>
</html>