@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
    <div class="col-md-8"> <i class="fas fa-align-justify"></i> Category
    <a href="category/create" class="btn btn-success btn-sm float-right">
    <i class="fas fa-plus"></i> Create category</a>
    <hr>

    @if(Session()->has('status') )
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>{{Session()->get('status')}}</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>         
        </div>
    @endif
    <table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)
        <tr>
            <td scope="row">{{$category->id}}</td>
            <td scope="row">{{$category->name}}</td>
            <td scope="row">
            <a href="/management/category/{{$category->id}}/edit" class="btn btn-warning">Edit</a>
            </td>
            <td scope="row">
            <form action="/management/category/{{$category->id}}" method="post">
              @csrf
              @method('DELETE')
              <input type="submit" value="Delete" class="btn btn-danger">
            </form>
            </td>
        </tr>
        @endforeach
  </tbody>
</table>

    {{ $categories->links() }}

    </div>
    </div>
    </div>
@endsection