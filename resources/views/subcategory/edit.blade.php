@extends('base')

@section('main')
<div class="row" style="padding: 2em;">
 <div class="col-sm-10 offset-sm-2">
    <h3 class="text-center" style="padding-bottom: 5px;">Update Sub Category</h3>
  <div>
      <form method="post" action="{{ route('subcategory.update', $subcategory->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group row">    
                <label for="category_id" class="col-sm-3 col-form-label">Category :</label>
                <div class="col-sm-8">
                  <select id="category_id" name="category_id" class="form-control">
                      <option selected value="">Select Category</option>
                      @foreach($categorys as $subcate)
                        <option selected data-tokens="{{$subcate->sku}}" value="{{$subcate->id}}">{{ $subcate->name}}</option>
                        @endforeach
                  </select>
                      @if ($errors->has('subcategory'))
                          <div class="error" style="color:#761b18;">{{ $errors->first('subcategory') }}</div>
                      @endif
                </div>
            </div>
            <div class="form-group row">    
                <label for="sku" class="col-sm-3 col-form-label">SubCategory Name :</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" value="{{$subcategory->name}}" id="name" name="name" placeholder="Sub Category Name"/>
                      @if ($errors->has('name'))
                          <div class="error" style="color:#761b18;">{{ $errors->first('name') }}</div>
                      @endif
                </div>
            </div>
          <div class="text-center">                        
            <button type="submit" class="btn btn-success">Update Subcategory</button>
          </div>
      </form>
  </div>
</div>
</div>
@endsection