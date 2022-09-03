@extends('layouts.admin')
@section('title')
Products
@endsection
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header d-flex justify-content-between">
<div class="w-75">
<h2>Edit Product</h2>
</div>
<div>
<a class="btn btn-info" href="{{url('/product')}}">Manage Product</a>
</div>
</div>
<div class="card-body">

{!! Form::open(['url'=>'update-product/'.$product->id, 'method'=>'POST']) !!}

<div class="row">
@if(Session::has('msg'))
<p style="color:red">{{Session::get('msg')}}</p>
@endif
@if(Session::has('msg'))
<p style="color:green">{{Session::get('msg')}}</p>
@endif

<div class="form-group col-md-12">
{!!Form::label('name','Product Name')!!}
{!!Form::text('name',$product->name,['class'=>'form-control'])!!}
@error('name')
<span class="text-danger">{{$message}}</span>
    
 @enderror

</div>
<div class="form-group col-md-12">

{!!Form::label('category_id','Category Name')!!}
{!!Form::select('category_id',$categories,$product->category_id,['class'=>'form-control','id'=>'category_id'])!!}


</div> 
<div class="form-group col-md-12">
{!!Form::label('description','Product Description')!!}
{!!Form::text('description',$product->description,['class'=>'form-control'])!!}
<span class="text-danger">@error('description'){{$message}}@enderror</span>
</div>

<div class="form-group col-md- 12">
{!!Form::label('Price','Product Price')!!}
{!!Form::text('buy_price',$product->buy_price,['class'=>'form-control'])!!}
<span class="text-danger">@error('buy_price'){{$message}}@enderror</span>
</div>


<div class="form-group col-md-12">
{!!Form::label('discount','discount')!!}
{!!Form::text('discount',$product->discount,['class'=>'form-control'])!!}
<span class="text-danger">@error('discount'){{$message}}@enderror</span>
</div>
 
<div class="form-group col-md-12">
 {!!Form::label('discount_type','discount type')!!}
{!!Form::select('discount_type',['%'=>'%','flat'=>'flat'],$product->discount_type,['class'=>'form-control','placeholder'=>'select one'])!!} 
<span class="text-danger">@error('discount_type'){{$message}}@enderror</span>
</div>  

<div class="form-group col-md-12">
{!!Form::label('sell_price','sell price  ')!!}
{!!Form::text('sell_price',$product->sell_price,['class'=>'form-control'])!!}
<span class="text-danger">@error('sell_price'){{$message}}@enderror</span>
</div>
{!! Form::submit('submit',['class'=>'btn btn-danger'])!!}
</div>
{!!Form::close() !!}  
</div>
</div>

</div>
</div>
</div>

@endsection