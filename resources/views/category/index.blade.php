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
    <h3 class="text-center" style="padding-bottom: 5px;">List Of ALL Category</h3> 
    <div>
        <a style="margin: 19px;" href="{{ route('category.create')}}" class="btn btn-primary">New Category</a>
    </div>  
</div> 
    <table class="table table-striped col-sm-8">
        <thead>
            <tr class="font-weight-bold">
              <td>Sr.</td>
              <td>Name</td>
              <td colspan = "2">Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($categorys as $key=>$category)
            
            <tr>
                <td>{{$key + 1 }}</td>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{ route('category.edit',$category->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('category.destroy', $category->id)}}" method="post">
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