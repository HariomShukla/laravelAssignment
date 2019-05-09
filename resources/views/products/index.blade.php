@extends('base')

@section('main')

<div class="row">
<div class="col-sm-12">
    <div class="col-sm-12" style="padding-top:20px;">
        @if(session()->get('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}  
            </div>
        @endif
    </div>
    <h3 class="text-center" style="padding-bottom: 5px;">List Of ALL Products</h3>  
    <div>
        <a style="margin: 19px;" href="{{ route('products.create')}}" class="btn btn-primary">New product</a>
    </div>  
  <table class="table table-striped">
    <thead>
        <tr class="font-weight-bold">
          <td>Sr.</td>
          <td>SKU</td>
          <td>Title</td>
          <td>Quantity</td>
          <td>Selling Price</td>
          <td>Buying Price</td>
          <td>Category</td>
          <td>Sub Category</td>
          
          <td colspan = "2">Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key=>$product)
        
        <tr>
            <td>{{$key + 1 }}</td>
            <td>{{$product->sku}}</td>
            <td>{{$product->title}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->selling_price}}</td>
            <td>{{$product->buying_price}}</td>
            <td>{{$product->category_name}}</td>
            <td>{{$product->subcategory_name}}</td>
            <td>
                <a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection