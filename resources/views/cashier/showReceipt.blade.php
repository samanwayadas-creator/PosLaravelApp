<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samanwaya's - Restaurant - SaleID: {{$sale->id}}</title>
    <link type="text/css" rel="stylesheet" href="{{asset('/css/receipt.css')}}" media="all">
    <link type="text/css" rel="stylesheet" href="{{asset('/css/no-print.css')}}" media="print">
</head>
<body>
    <div id="wrapper">
        <div id="reciept-header">
            <h3 id="restaurant-name">Samanwaya's Restaurant</h3>
            <p>Address: 357, 1st C cross, near SBI</p>
            <p>Pancholi, Bangalore - 560065</p>
            <p>Tel: 823-XXXX-XXXX</p>
            <p>Reference Receipt: <strong>{{$sale->id}}</strong></p>
        </div>
        <div id="reciept-body">
            <table class="tb-sale-detail">
                <thead>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Quantity</th>
                    <th>price</th>
                    <th>Total</th>
                </thead>
                <tbody>
                    @foreach($saleDetails as $saleDetail)
                        <tr>
                            <td width="30">{{$saleDetail->menu_id}}</td>
                            <td width="180">{{$saleDetail->menu_name}}</td>
                            <td width="50">{{$saleDetail->quantity}}</td>
                            <td width="55">{{$saleDetail->menu_price}}</td>
                            <td width="65">{{$saleDetail->menu_price * $saleDetail->quantity}}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            <table class="tb-sale-total">
                <tbody>
                    <tr>
                        <td>Total Quantity</td>
                        <td>{{$saleDetails->count()}}</td>
                        <td>Total price</td>
                        <td>&#8377;{{number_format($sale->total_price,2)}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Payment Type</td>
                        <td colspan="2">{{$sale->payment_type}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Paid Amount</td>
                        <td colspan="2">&#8377;{{number_format($sale->total_recieved, 2)}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Change</td>
                        <td colspan="2">&#8377;{{number_format($sale->change, 2)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="reciept-footer">
            <p>Thank you!! Visit us again!</p>
        </div>
        <div id="buttons">
            <a href="/cashier">
            <button class="btn btn-back">
             Back to Cashier Page
            </button>
            </a>
            <button class="btn btn-print" type="button" onclick="window.print(); return false;">
            Print Receipt
            </button>
        </div>
    </div>
</body>
</html>