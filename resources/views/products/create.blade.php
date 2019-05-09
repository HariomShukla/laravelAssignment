@extends('base')

@section('main')
<div class="row" style="padding: 2em;">
 <div class="col-sm-10 offset-sm-2">
    <h3 class="text-center" style="padding-bottom: 5px;">Add New Product</h3>
  <div>
      <form method="post" action="{{ route('products.store') }}">
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
              <label for="sku" class="col-sm-3 col-form-label">SKU :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="sku"/>
                    @if ($errors->has('sku'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('sku') }}</div>
                    @endif
              </div>
          </div>

          <div class="form-group row">
              <label for="title" class="col-sm-3 col-form-label">Title :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="title"/>
                @if ($errors->has('title'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('title') }}</div>
                @endif
              </div>
          </div>

          <div class="form-group row">
              <label for="quantity" class="col-sm-3 col-form-label">Quantity :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="quantity"/>
                    @if ($errors->has('quantity'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('quantity') }}</div>
                    @endif
              </div>
          </div>
          <div class="form-group row">
              <label for="selling_price" class="col-sm-3 col-form-label">Selling Price:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="selling_price"/>
                    @if ($errors->has('selling_price'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('selling_price') }}</div>
                    @endif
              </div>
          </div>
          <div class="form-group row">
              <label for="buying_price" class="col-sm-3 col-form-label">Buying Price :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="buying_price"/>
                @if ($errors->has('buying_price'))
                        <div class="error" style="color:#761b18;">{{ $errors->first('buying_price') }}</div>
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