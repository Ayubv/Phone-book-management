@extends('layouts.admin')
@section('title')
Products
@endsection
@section('content')
<style>
    input, button, select, optgroup, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    border: none;
    float: right;
    background: none;
}
</style>
<div class="container">
    @include('flash-message');
<div class="row">
<div class="col-md-12">


<div class="card">
<div class="card-header d-flex justify-content-between">
<div class="w-20">
<h2>This is product page</h2>
</div>
<div>
<a class="btn btn-outline-danger" href="{{route('product-add')}}">Add</a>
</div>
</div>
<div class="card-body">


</div>
<table class="table table-light table-striped">
<thead class="">
<tr>
<th>#SL.</th>
<th>Name</th>
<th>Description</th>
<th>Buy Price</th>
<th>Discount</th>
<th>Category name</th>
<th>Sell Price</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach ( $products as $product )
        <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->buy_price}}</td>
        <td>{{$product->discount}}</td>
        <td>{{$product->category_name}}</td>
        <td>{{$product->sell_price}}</td>
        <td>{{$product->status}}</td>
        <td>
            <a href="{{url('edit-product/'.$product->id)}}" class="btn btn-danger">Edit</a>
            
            <a href="{{url('update-product/'.$product->id)}}" class="btn btn-success">Delete</a>
        </td>
        </tr>
@endforeach
</tbody>
</table>
<div>
{{$products->links()}}
</div>
</div>
</div>
</div>
</div>
</div>   

<script type="text/javascript">
$(document).ready(function(){

// Initialize Select2
$('#sel_users').select2();

// Set option selected onchange
$('#user_selected').change(function(){
var value = $(this).val();

// Set selected
$('#sel_users').val(value);
$('#sel_users').select2().trigger('change');
});
});
</script>

@endsection