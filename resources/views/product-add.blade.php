@extends('layouts.admin')
@section('title')
Products
@endsection
@section('content')

<div class="container mt-4">
    @include('flash-message');
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header d-flex justify-content-between">
<div class="w-75">
<h2>Create Product</h2>
</div>
<div>
<a class="btn btn-info" href="{{url('/product')}}"> <i class="fas fa-bars"></i> Manage Product</a>
</div>
</div>
<div class="card-body">

{!! Form::open(['url'=>'/product-store', 'method'=>'POST']) !!}
<div class="row">
<div class="form-group col-md-12 mb-3">
{!!Form::label('name','Product Name')!!}
{!!Form::text('name','',['class'=>'form-control'])!!}

<span class="text-danger">@error('name'){{$message}}@enderror</span>
</div>
<div class="form-group col-md-12 mb-3">
{!!Form::label('description','Product Description')!!}
{!!Form::text('description','',['class'=>'form-control'])!!}

<span class="text-danger">@error('description'){{$message}}@enderror</span>
</div>
<div class="form-group col-md-12 mb-3">
{!!Form::label('buy_price','Product price ')!!}
{!!Form::text('buy_price','',['class'=>'form-control'])!!}

<span class="text-danger">@error('buy_price'){{$message}}@enderror</span>
</div>
<div class="form-group col-md-12 mb-3">
{!!Form::label('category_id','Category Name')!!}
{!!Form::select('category_id',$categories,'',['class'=>'form-control','id'=>'category_id','placeholder'=>'select one'])!!}
<span class="text-danger">@error('category_id'){{$message}}@enderror</span>
</div>


<div class="form-group col-md-12 mb-3">
{!!Form::label('discount','discount Price')!!}
{!!Form::text('discount','',['class'=>'form-control'])!!}
<span class="text-danger">@error('discount'){{$message}}@enderror</span>
</div>

<div class="form-group col-md-12 mb-3">
{!!Form::label('discount_type','discount type ')!!}
{!!Form::select('discount_type',['%'=>'%','flat'=>'flat'],'',['class'=>'form-control','placeholder'=>'select one'])!!}
<span class="text-danger">@error('discount_type'){{$message}}@enderror</span>
</div>
<div class="form-group col-md-12 mb-3">
{!!Form::label('sell_price','sell price  ')!!}
{!!Form::text('sell_price','',['class'=>'form-control'])!!}
<span class="text-danger">@error('sell_price'){{$message}}@enderror</span>
</div>

</div>
<div class="form-group col-md-12 mb-3 d-flex justify-content-between">
{!! Form::submit('submit',['class'=>'btn btn-danger'])!!}
{!! Form::button('Back',['class'=>'btn btn-info'])!!}

</div>

{!!Form::close() !!}   


</div>
</div>

</div>
</div>
</div>

@endsection