@extends('base')

@section('main')
<div class="row" style="padding: 2em;">
 <div class="col-sm-10 offset-sm-2">
    <h3 class="text-center" style="padding-bottom: 5px;">Create New Category</h3>
  <div>
      <form method="post" action="{{ route('category.store') }}">
            {{ csrf_field() }}
            <div class="form-group row">    
                <label for="sku" class="col-sm-3 col-form-label">Category Name :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Category Name"/>
                      @if ($errors->has('name'))
                          <div class="error" style="color:#761b18;">{{ $errors->first('name') }}</div>
                      @endif
                </div>
            </div>
          <div class="text-center">                        
            <button type="submit" class="btn btn-success">Add Category</button>
          </div>
      </form>
  </div>
</div>
</div>
@endsection