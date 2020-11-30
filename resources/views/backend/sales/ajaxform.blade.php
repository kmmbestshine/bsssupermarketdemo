
<div class="row">
    <div class="col-md-2">
        <button onClick="history.go(0);">Refresh Page</button>
        <a onclick="printorder()" type="submit" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> Print Bill</a>
        
    </div>
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <form action="{{route('save.sales')}}" method="post">
            {{csrf_field()}}
            @php($i = 0)
            @foreach($salescart as $sc)
                <input type="hidden" name="product_id[{{$i}}]" value="{{$sc->product_id}}">
                <input type="hidden" name="quantity[{{$i}}]" value="{{$sc->quantity}}">
                <input type="hidden" name="unit[{{$i}}]" value="{{$sc->unit}}">
                <input type="hidden" name="price[{{$i}}]" value="{{$sc->price}}">
                <input type="hidden" name="taxvalue[{{$i}}]" value="{{$sc->taxRate}}">
                <input type="hidden" name="saleValue[{{$i}}]" value="{{$sc->saleValue}}">
                <input type="hidden" name="sales_status[{{$i}}]" value="{{$sc->sales_status}}">
                @php($i++)
            @endforeach
            <input type="hidden" name="total_product" value="{{$i}}">
            <div style="overflow: hidden">
            <div style="border:1px solid #cccccc; float:left; padding-bottom:1000px; margin-bottom:-1000px" >
                <span>Invoice Status :-</span>
                <select id = "invoice_status" onchange = "ShowHideDiv()" >
                   <option value="N" selected>Paid</option>
                    <option value="N" >Quote</option>
                    <option value="Y">Unpaid</option>
                    <option value="Y">Partial</option>          
                </select>
            </div>
            <div style="border:1px solid #cccccc; float:left; padding-bottom:1000px; margin-bottom:-1000px">
                <div id="dvPassport" style="display: none">
    
                    <input class="form-control numeric-p8d2" type="text" id="txtPassportNumber" name="amountRecieved" value=0.00 />
                </div>
            </div>
        </div>
            <div id="container">
            <div id="left-column">    
            <div class="form-group">
            <label>Customer Details:- &nbsp;</label>
             
            <input type="radio" name="sales_status" value="1" id="Active" checked=""><label for="Active"> Retail Sales </label>
            <input type="radio" name="sales_status" id="deactive" value="0" ><label for="deactive"> Wholesale Sales </label>
            </div>            
            <input style="display:none;" type="text" name="creditorName" id="creditorName" placeholder="Customer Name"/>
            <input style="display:none;" type="text" pattern="^\d{10}$" name="creditorPh" id="creditorPh" placeholder="Customer Phone no"/>
            <input id="person" type="text" style="display:none;" name="person" placeholder="Person">
            <br>  
             <br> 
            <input id="state" type="text" style="display:none;" name="state" placeholder="State">        
            <input style="display:none;" type="text"  name="place" id="place" placeholder="Place"/>
            <input id="address" type="text" style="display:none;" name="address" placeholder="Address" maxlength="100">
            <br>
            <br>
            <input id="pan" type="text" style="display:none;" name="pan" placeholder="PAN">
            <input id="gstin" type="text" style="display:none;" name="gstin" placeholder="GSTIN" maxlength="15" >
            <br>
            <br>
            </div>
            </div>
            <button type="submit"  class="btn btn-info" target="_blank" onclick="return confirm('Do You Print Out The Bill?')"> Clear Sales Bucket</button>
        </form>

    </div>
</div>