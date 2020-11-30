
<table width="100%" class="table table-striped table-bordered table-hover" id="categorytable">
    <thead>
    <tr>
        <th>S.N.</th>
        <th>Product Name</th>
        <th>Qty</th>
        <th>Rs/Unit</th>
        <th>Tax</th>
        <th>GST</th>
        <th>Sub Tot</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    @foreach($sales as $pc)
        <tr>
            <th> {{$i++}}</th>
            <td>{{$pc->name}} </td>
            <td> {{$pc->quantity}}</td>
            <td>{{$pc->prod_price}} </td>
            <td>{{$pc->taxrat}}%</td>
            <td>{{$pc->taxRate}}</td>
            <td>@php  
                        $subtotal =  $pc->price;
                        @endphp
                        {{$subtotal}}</td>
            <td>
                <form action="{{route('salescart.delete' ,[$pc->id,$pc->product_id])}}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete?')" ><i class="fa fa-trash-o"></i></button>
                </form></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="2">Sub Total</td>
        <td><?php $qtytotal=0 ?>
                @if($sales)
                    @foreach($sales as $s)
                        @php
                        $quantity = $s->quantity;
                        $qtytotal += $quantity;
                        @endphp
                    @endforeach
                    {{$qtytotal}}
                @endif</td>
        <td></td>
        <td></td>
        <td><?php $taxtotal=0 ?>
                @if($sales)
                    @foreach($sales as $s)
                        @php
                        $taxRate = $s->taxRate ;
                        $taxtotal += $taxRate;
                        @endphp
                    @endforeach
                    {{$taxtotal}}
                @endif
            </td>
        <td>
            <?php $total=0; ?>
                @if($sales)
                    @foreach($sales as $s)
                        @php
                        $price = $s->price ;
                        $total += $price;
                        @endphp
                    @endforeach
                    {{$total}}
                @endif
        </td>
    </tr>
    <tr>
        <td colspan="6"><strong><b>GST Total</b></strong></td>
        <td>
            <?php $taxtotal=0 ?>
                @if($sales)
                    @foreach($sales as $s)
                        @php
                        $taxRate = $s->taxRate ;
                        $taxtotal += $taxRate;
                        @endphp
                    @endforeach
                    <strong><b>{{$taxtotal}}</b></strong>
                @endif
        </td>
    </tr>
    <tr>
        <td colspan="6"><strong><b>Grand Total</b></strong></td>
        <td><?php $total=0;$taxtotal=0; ?>
                @if($sales)
                    @foreach($sales as $s)
                        @php
                        $taxRate = $s->taxRate ;
                        $taxtotal += $taxRate;
                        $price = $s->price ;
                        $total += $price;
                        $grandtotal=$taxtotal+$total;
                        @endphp
                    @endforeach
                    <strong><b> {{$grandtotal}}</b></strong>
                @endif
            </td>
    </tr>
    </tbody>
</table>

