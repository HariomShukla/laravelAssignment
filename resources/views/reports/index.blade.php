@extends('base')

@section('main')
<div class="row" style="padding: 2em;">
 <div class="col-sm-10 offset-sm-2">
    <h3 class="text-center" style="padding-bottom: 5px;">Link Products With Parent Products</h3>
  <div>
      <form method="post" action="{{ action('ReportController@linkproduct') }}">
            {{ csrf_field() }}
          <div class="form-group row">    
                <label for="category_id" class="col-sm-3 col-form-label">Category :</label>
                <div class="col-sm-8">
                  <select id="category_id" name="category_id" class="form-control">
                      <option selected value="">Select Category</option>
                      @foreach($categorys as $category)
                        <option data-tokens="{{$category->name}}" value="{{$category->id}}">{{ $category->name}}</option>
                        @endforeach
                  </select>
                      @if ($errors->has('subcategory'))
                          <div class="error" style="color:#761b18;">{{ $errors->first('subcategory') }}</div>
                      @endif
                </div>
            </div>
        <div class="form-group row">    
                <label for="subcategory_id" class="col-sm-3 col-form-label">Sub Category :</label>
                <div class="col-sm-8">
                  <select id="subcategory_id" name="subcategory_id" class="form-control">
                      <option selected value="">Select SubCategory</option>
                      @foreach($subcategorys as $subcategory)
                        <option data-tokens="{{$subcategory->name}}" value="{{$subcategory->id}}">{{ $subcategory->name}}</option>
                        @endforeach
                  </select>
                      @if ($errors->has('subcategory'))
                          <div class="error" style="color:#761b18;">{{ $errors->first('subcategory') }}</div>
                      @endif
                </div>
        </div>

        <div class="form-group row">    
            <label for="product_id" class="col-sm-3 col-form-label">Choose Product To Link :</label>
            <div class="col-sm-8">
              <select id="product_id" name="product_id" class="form-control">
                  <option selected value="">Select Product</option>
                  @foreach($products as $product)
                    <option data-tokens="{{$product->title}}" value="{{$product->id}}">{{ $product->title}}</option>
                    @endforeach
              </select>
                  @if ($errors->has('product_id'))
                      <div class="error" style="color:#761b18;">{{ $errors->first('product_id') }}</div>
                  @endif
            </div>
    </div>
          
          <div class="text-center">                        
            <button type="submit" class="btn btn-success">Add Product</button>
          </div>
      </form>
  </div>
</div>
</div>
@endsection