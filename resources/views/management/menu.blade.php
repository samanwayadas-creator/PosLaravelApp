@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    @include('management.inc.sidebar')
    <div class="col-md-8"> <i class="fas fa-pizza-slice"></i> Menu
      <a href="/management/menu/create " class="btn btn-success btn-sm float-right">
        <i class="fas fa-plus"></i> Create Menu</a>
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
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Picture</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($menus as $menu)
          <tr>
            <td scope="row">{{$menu->id}}</td>
            <td scope="row">{{$menu->name}}</td>
            <td scope="row"> &#x20B9;{{$menu->price}}</td>
            <td scope="row">
              <img src="{{asset('menu_images')}}/{{$menu->image}}" class="rounded mx-auto d-block" alt="{{$menu->name}}" height="120px" width="120px">
            </td>

            <td scope="row">{{$menu->decription}}</td>
            <td scope="row">{{$menu->category->name}}</td>

            <td>
              <a href="/management/menu/{{$menu->id}}/edit " class="btn btn-warning">Edit</a>
            </td>
            <td>
              <form action="/management/menu/{{$menu->id}}" method="post">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" value="Delete" type="submit">
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection