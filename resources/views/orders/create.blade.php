@extends('base')

@section('main')
<div class="row" style="padding: 2em;">
 <div class="col-sm-10 offset-sm-2">
    <h3 class="text-center" style="padding-bottom: 5px;">Add New Order</h3>
  <div>
      <form method="post" action="{{ route('orders.store') }}">
            {{ csrf_field() }}
          <div class="form-group row">    
              <label for="product_id" class="col-sm-3 col-form-label">Product :</label>
              <div class="col-sm-8">
                <select id="product_id" name="product_id" class="form-control">
                    <option selected value="">Select</option>
                    @foreach($products as $product)
                      <option data-tokens="{{$product->title}}" value="{{$product->id}}|{{$product->title}}">{{ $product->title}}</option>
                      @endforeach
                </select>
                    @if ($errors->has('product_id'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('product_id') }}</div>
                    @endif
              </div>
          </div>
          
          <div class="form-group row">
              <label for="item_quantity" class="col-sm-3 col-form-label">Item Quantity :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="item_quantity" name="item_quantity" placeholder="Item Quantity"/>
                @if ($errors->has('item_quantity'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('item_quantity') }}</div>
                @endif
              </div>
          </div>
          <div class="form-group row">
              <label for="sku" class="col-sm-3 col-form-label">SKU :</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control" id="sku" name="sku" placeholder="SKU Value"/>
                    @if ($errors->has('sku'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('sku') }}</div>
                    @endif
              </div>
          </div>
          <div class="form-group row">
              <label for="item_price" class="col-sm-3 col-form-label">Item Price(Selling) :</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control" id="item_price" name="item_price" placeholder="Price per quantity"/>
                    @if ($errors->has('item_price'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('item_price') }}</div>
                    @endif
              </div>
          </div>
          <div class="form-group row">
              <label for="item_profit" class="col-sm-3 col-form-label">Item Profit :</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control" id="item_profit" name="item_profit" placeholder="Total Profit"/>
                    @if ($errors->has('item_profit'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('item_profit') }}</div>
                    @endif
              </div>
          </div>
          <div class="text-center">                        
            <button type="submit" class="btn btn-success">Add Order</button>
          </div>
      </form>
  </div>
</div>
</div>
@endsection
