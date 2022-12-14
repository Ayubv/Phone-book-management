<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<style>
@import url("https://fonts.googleapis.com/css?family=Titillium+Web");
* {
font-family: "Titillium Web", sans-serif;
}
body {
height: 2000px;
}
.navbar .navbar-brand {
font-size: 30px;
}
.navbar .nav-item {
padding: 10px 20px;
}
.navbar .nav-link {
font-size: 20px;
margin-left: 10px;
}
.fa-bars {
color: #007bff;
font-size: 30px;
}
.bg-dark {
background-color: #19322c!important;
}
a {
color: #f8fafd;
text-decoration: none;
background-color: transparent;
-webkit-text-decoration-skip: objects;
}

</style>
</head>

<body>

<nav class="navbar sticky-top navbar-expand-lg bg-dark">
<div class="container">
<a class="navbar-brand" href="#">Logo</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<i class="fas fa-bars"></i>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto w-100 justify-content-end">
<li class="nav-item">
<a class="nav-link" href="{{url('/login')}}">Login</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{url('/registration')}}">Registration</a>
</li>
</ul>
</div>
</div>
</nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>