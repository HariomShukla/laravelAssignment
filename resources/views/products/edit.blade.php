@extends('base')

@section('main')
<div class="row" style="padding: 2em;">
 <div class="col-sm-10 offset-sm-2">
    <h3 class="text-center" style="padding-bottom: 5px;">Update Product</h3>
  <div>
      <form method="post" action="{{ route('products.update', $product->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
          <div class="form-group row">    
              <label for="sku" class="col-sm-3 col-form-label font-weight-bold">SKU :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="sku" value="{{ $product->sku }}"/>
                    @if ($errors->has('sku'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('sku') }}</div>
                    @endif
              </div>
          </div>

          <div class="form-group row">
              <label for="title" class="col-sm-3 col-form-label font-weight-bold">Title :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="title" value="{{ $product->title }}"/>
                @if ($errors->has('title'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('title') }}</div>
                @endif
              </div>
          </div>

          <div class="form-group row">
              <label for="quantity" class="col-sm-3 col-form-label font-weight-bold">Quantity :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}"/>
                    @if ($errors->has('quantity'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('quantity') }}</div>
                    @endif
              </div>
          </div>
          <div class="form-group row">
              <label for="selling_price" class="col-sm-3 col-form-label font-weight-bold">Selling Price:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="selling_price" value="{{ $product->selling_price }}"/>
                    @if ($errors->has('selling_price'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('selling_price') }}</div>
                    @endif
              </div>
          </div>
          <div class="form-group row">
              <label for="buying_price" class="col-sm-3 col-form-label font-weight-bold">Buying Price :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="buying_price" value="{{ $product->buying_price }}"/>
                @if ($errors->has('buying_price'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('buying_price') }}</div>
                @endif
              </div>
          </div>
          
          <div class="text-center">                        
            <button type="submit" class="btn btn-success">Update Product</button>
          </div>
      </form>
  </div>
</div>
</div>
@endsection