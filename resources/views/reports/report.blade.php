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
    <h4 class="text-center" style="padding-bottom: 5px;">List Of ALL Products(Ordered)</h4><h5 class="text-center" style="padding-bottom: 10px;"> Because Report will be only bassed on order.</h5>  
    <div class="form-group row">    
            <label class="col-sm-2 col-form-label">Filter Report :</label>
            <select id="report" class="col-sm-3">
                <option selected value="">Select for report<option>
                <option value="profit">Top 5 Profitable<option>
                <option value="quantity">Top 5 Quantity<option>
                <option value="all">All Products<option>
                <option value="parent">Parents with child<option>
            </select>
    </div>  
  <table class="table table-striped" id="table">
    <thead>
        <tr class="font-weight-bold">
          <td>Sr.</td>
          <td>Category</td>
          <td>Subcategory</td>
          <td>SKU</td>
          <td>Quantity</td>
          <td>Item Price</td>
          <td>Profilts</td>
          
        </tr>
    </thead>
    <tbody>      
    </tbody>
  </table>
<div>
</div>
@endsection