@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <div class="jumbotron jumbotron-fluid bg-info">
                <div class="container">
                    <h1 class="display-4 text-white">Samanwaya's restaurant!</h1>
                    <hr class="bg-light">
                    <h3 class="font-italic text-white">This is the opertional management page! Proceed ahead with caution</h3>
                    <h4><span class="badge badge-light">Changes done here will effect the opertion of the restaurant!</span></h4>
                    <h1><span class="badge badge-light"><i class="fas fa-cog"></i></span></h1>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection