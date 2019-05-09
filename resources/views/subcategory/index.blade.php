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
    <h3 class="text-center" style="padding-bottom: 5px;">List Of ALL Subcategory</h3> 
    <div>
        <a style="margin: 19px;" href="{{ route('subcategory.create')}}" class="btn btn-primary">New Subcategory</a>
    </div>  
</div> 
    <table class="table table-striped col-sm-8">
        <thead>
            <tr class="font-weight-bold">
              <td>Sr.</td>
              <td>Category</td>
              <td>Name</td>
              <td colspan = "2">Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php //echo "<pre>"; print_r($subcategorys); die;
               
                ?>
            @foreach($subcategorys as $key=>$subcategory)
            @if($subcategory->subcategories != "")
            <tr>
                <td>{{$key + 1 }}</td>
                <td>{{$subcategory->name}}</td>
                <td>{{$subcategory->subcategories['name']}}</td>
                <td>
                    <a href="{{ route('subcategory.edit',$subcategory->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('subcategory.destroy', $subcategory->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
            
        </tbody>
      </table>
<div>
</div>
@endsection