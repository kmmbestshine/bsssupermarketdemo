<!doctype html>
<html><head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head><body>
<p align="center"><strong>Bestshine Bazar Management System</strong></p>
<p align="center">Trichy</p>
<p align="center">PH: 95666 21401</p>
<p align="center">PAN No: 603655986</p>
<hr>
<p>Date: <?php echo date("d-m-Y");?></p>
<hr>
<table border="0" align="center">
    <thead>
    <tr>
        <th>S.N.</th>
        <th>Product Name</th>
        <th>Units</th>
        <th>Quantity</th>
        <th>Price/Unit</th>
        <th>GST %</th>
        <th>GST Value</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    @foreach($report as $all)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$all->name}}</td>
        <td>{{$all->unit}}</td>
        <td>{{$all->quantity}}</td>
        <td>{{$all->pro_price}}</td>
        <td>{{$all->taxpercent}}%</td>
        <td>{{$all->taxRate}}</td>
        <td>{{$all->saleValue}}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="3"> Grand Total </td>
        <td>
            <?php $total=0 ?>
            @if($report)
                @foreach($report as $s)
                    @php
                        $price = $s->saleValue;
                        $total += $price;
                    @endphp
                @endforeach
                Rs. {{$total}}
            @endif
        </td>
    </tr>
    </tbody>
</table>
<br>
<p>prepared by: Srada &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Time: <?php  echo time() ; ?></p>
<p align="center">Thank You</p>
</body></html>


