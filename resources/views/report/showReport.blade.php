@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Main Function</a></li>
                    <li class="breadcrumb-item"><a href="/report">Report</a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Result</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            @if($sales->count() > 0)
            <div class="alert alert-success" role="alert">
                <p>The total amount of Sale from {{$dateStart}} to {{$dateEnd}} is
                    &#8377; {{number_format($totalSale, 2)}}
                </p>
                <p>
                    Total results: {{$sales->total()}}
                </p>
            </div>
            <table class="table">
                <thead>
                    <tr class="bg-primary text-light">
                        <th scope="col">#</th>
                        <th scope="col">Receipt ID</th>
                        <th scope="col">Date time</th>
                        <th scope="col">Table</th>
                        <th scope="col">Staff</th>
                        <th scope="col">Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $countSale = ($sales->currentPage() - 1) * $sales->perPage() + 1;
                    @endphp
                    @foreach($sales as $sale)
                        <tr class="bg-warning text-dark">
                            <td scope="row">{{$countSale++}}</td>
                            <td scope="row">{{$sale->id}}</td>
                            <td scope="row">{{date("m/d/Y H:i:s", strtotime($sale->updated_at))}}</td>
                            <td scope="row">{{$sale->table_name}}</td>
                            <td scope="row">{{$sale->user_name}}</td>
                            <td scope="row">&#8377; {{$sale->total_price}}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Menu ID</th>
                            <th>Menu</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                        </tr>
                        @foreach($sale->saleDetails as $saleDetail)
                            <tr>
                                <td></td>
                                <td scope="row">{{$saleDetail->menu_id}}</td>
                                <td scope="row">{{$saleDetail->menu_name}}</td>
                                <td scope="row">{{$saleDetail->quantity}}</td>
                                <td scope="row">&#8377; {{$saleDetail->menu_price}}</td>
                                <td scope="row">&#8377; {{$saleDetail->menu_price * $saleDetail->quantity}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            {{$sales->appends($_GET)->links()}}
            <form action="/report/show/export" method="get">
                <input type="hidden" name="dateStart" value="{{$dateStart}}">
                <input type="hidden" name="dateEnd" value="{{$dateEnd}}">
                <input type="submit" class="btn btn-dark" value="Export to Excel">
            </form>

            @else
            <div class="alert alert-danger" role="alert">
                There is no sale report
            </div>
            @endif
        </div>


    </div>
</div>
@endsection