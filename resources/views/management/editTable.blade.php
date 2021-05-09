@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-md-8"> <i class="fas fa-chair"></i> Edit a Table
            <hr>
            @if($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Warning!</h4>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>

            @endif
            <form action="/management/table/{{$table->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tableName">Table Name</label>
                    <input type="text" name="name" value="{{$table->name}}" class="form-control" placeholder="Table...">
                </div>
                <div class="form-group">
                    <label for="tableStatus">Status</label>
                    <input type="text" name="status" value="{{$table->status}}" class="form-control" placeholder="Status..">
                </div>
                <button type="submit" class="btn btn-warning"><i class="fas fa-edit">Update</i></button>
            </form>
        </div>
    </div>
</div>
@endsection