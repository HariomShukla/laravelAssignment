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
    <h3 class="text-center" style="padding-bottom: 5px;">List Of ALL Orders</h3>  
    <div>
        <a style="margin: 19px;" href="{{ route('orders.create')}}" class="btn btn-primary">New Order</a>
    </div>  
  <table class="table table-striped">
    <thead>
        <tr class="font-weight-bold">
          <td>Sr.</td>
          <td>Order Id</td>
          <td>SKU</td>
          <td>Quantity</td>
          <td>Item Price</td>
          <td>Order Date</td>
          <td>Profilt</td>
          <td colspan = "2">Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $key=>$order)
        
        <tr>
            <td>{{$key + 1 }}</td>
            <td>{{$order->order_id}}</td>
            <td>{{$order->sku}}</td>
            <td>{{$order->item_quantity}}</td>
            <td>{{$order->item_price}}</td>
            <td>{{$order->order_date}}</td>
            <td>{{$order->item_profit}}</td>
            <td>
                <a href="{{ route('orders.edit',$order->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('orders.destroy', $order->id)}}" method="post">
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