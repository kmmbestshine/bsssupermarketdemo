<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Salescart;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;
use PDF;

class SalesController extends Controller
{
    public function create()
    {
        $this->checkpermission('sales-create');
        $salescart = Salescart::all();
        return view('backend.sales.create', compact( 'salescart'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'price' => 'required',
            'sales_quantity' => 'required',
        ]);
        if ($request->ajax()) {
            $taxablevalue=$request->price * $request->sales_quantity;
            $taxpercent=$request->taxrate / 100; 
            $taxvalue= $taxablevalue * $taxpercent;
            $price_no_gst=$request->price * $request->sales_quantity;
            $price_with_gst= $taxvalue + $price_no_gst;

            $sales = new Salescart();
            $sales->product_id = $request->product_id;
            $sales->unit = $request->unit;
            $sales->taxRate = $taxablevalue * $taxpercent;
            $sales->quantity = $request->sales_quantity;
            $sales->price = $request->price * $request->sales_quantity;
            $sales->saleValue = $price_with_gst;
            //$sales->sales_status = $request->sales_status;
            $sales->saller_name = Auth::user()->username;
            $sales->sales_date = date('Y-m-d');
            if ($sales->save()) {
                $product = Product::find($request->product_id);
                $product->stock = $product->stock - $request->sales_quantity;
                if ($product->update()) {
                    return response(['success_message' => 'SuccessFully Make sales']);
                }
            }

        } else {
            return response(['error_message' => 'Filed To Make sales']);
        }
    }

    public function index()
    {
        $this->checkpermission('sales-list');
        $sales = Sale::join('products', 'products.id', '=', 'sales.product_id')
            ->select('sales.*', 'products.name')
            ->orderBy('sales.created_at', 'DEC')
            ->get();
        return view('backend.sales.list', compact('sales'));
    }

    public function ajaxlist()
    {
         $sales = Salescart::join('products', 'products.id', '=', 'salescarts.product_id')
            ->select('salescarts.*', 'products.name','products.taxRate as taxrat','products.price as prod_price')
            ->orderBy('salescarts.created_at', 'DEC')
            ->get();
        return view('backend.sales.ajaxlist', compact('sales'));
    }

    public function ajaxform()
    {
        $salescart = Salescart::all();
        return view('backend.sales.ajaxform', compact('salescart'));
    }

    public function refreshproduct()
    {
        $product = Product::where('stock', '>=', 1)->get();
        return view('backend.sales.refreshproduct', compact('product'));
    }

    public function getquantity(Request $request)
    {
        $product = Product::where('id', $request->product_id)->get();
        echo $product[0]->stock;

    }
    public function getunit(Request $request)
    {
        $product = Product::where('id', $request->product_id)->get();
        echo $product[0]->unit;

    }
    public function gettaxrate(Request $request)
    {
        $product = Product::where('id', $request->product_id)->get();
        echo $product[0]->taxRate;

    }

    public function getprice(Request $request)
    {
        $product = Product::where('id', $request->product_id)->get();
        echo $product[0]->price;
    }

    public function getproductname(Request $request)
    {
        $product = Product::where('id', $request->product_id)->get();
        echo $product[0]->name;
    }

    public function getallpdf()
    {
        $report = Salescart::join('products', 'products.id', '=', 'salescarts.product_id')
            ->select('salescarts.*', 'products.name')
            ->get();
        return view('backend.pdfbill.salesbill', compact('report'));
    }

    public function getcustomreport(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $report = Sale::join('products', 'products.id', 'sales.product_id')
            ->select('sales.*', 'products.name')
            ->whereBetween('sales.sales_date', [$start, $end])
            ->get();
        $pdf = PDF::loadview('backend.pdfbill.allreport', compact('report', 'start', 'end'));
        return $pdf->download('salesreport.pdf');
    }

    public function savetosales(Request $request)
    {
         $input = \Request::all();
       // dd($input,$request);
            $customer = new Customer();
            $customer->name = $request->creditorName;
            $customer->gstin = $request->gstin;
            $customer->country = 'india';
            $customer->state = $request->state;
            $customer->person = $request->person;
            $customer->mobile = $request->creditorPh;
            $customer->pan = $request->pan;
            $customer->address = $request->address;
           // $customer->pincode = $request->sales_status;
            $customer->city = $request->place;
            //$customer->email = $request->sales_status;
            
            if(!empty($request->creditorName)){
                $customer->save();
                $cust_id= Customer::latest('id')->first();
                $customer_id=$cust_id->id;
               // dd($customer_id);
            }else{
                $customer_id='Nil';
            }
        

         for ($i = 0; $i < $request->input('total_product'); $i++) {
        $result=DB::table('sales')->insert(
            array(
            'customer_id' =>$customer_id,
            'product_id' => $request['product_id'][$i],
            'quantity' => $request['quantity'][$i],
            'price' => $request['price'][$i],
            'unit' => $request['unit'][$i],
            'gstvalue' => $request['taxvalue'][$i],
            //'busfeesid' => $busidNos[$key],
            'saleValue' => $request['saleValue'][$i],
            'saller_name' => Auth::user()->username,
            'sales_date' => date('Y-m-d'),
            
                    ));
        }

       
        DB::table('salescarts')->delete();
        return redirect()->back()->with('success_message', 'Successfuly Clear Your Bucket and Sales Item store in Sales Record');

    }

    public function deletecart($id, $pid)
    {
        $product = Product::find($pid);
        $salescart = Salescart::find($id);
        $product->stock = $product->stock + $salescart->quantity;
        if ($product->update()) {
            $salescart->delete();
            return redirect()->back()->with('success_message', 'Seccessfully deleted Item');
        }else {
            return redirect()->back()->with('error_messsage', 'Failed To Delete Item');
        }
    }
}
