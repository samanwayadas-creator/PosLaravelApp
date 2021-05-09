@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    @include('management.inc.sidebar')
    <div class="col-md-8"> <i class="fas fa-users-cog"></i> User
      <a href="/management/user/create " class="btn btn-success btn-sm float-right">
        <i class="fas fa-plus"></i> Create User</a>
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
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td scope="row">{{$user->id}}</td>
            <td scope="row">{{$user->name}}</td>
            <td scope="row">{{$user->role}}</td>
            <td scope="row">{{$user->email}}</td>

            <td>
              <a href="/management/user/{{$user->id}}/edit " class="btn btn-warning">Edit</a>
            </td>
            <td>
              <form action="/management/user/{{$user->id}}" method="post">
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