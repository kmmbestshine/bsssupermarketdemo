<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
    	//$suppliers=[];
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.index', compact('suppliers'));
    }
    public function create()
    {
    	//dd('jjjj');
        return view('backend.supplier.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->except('_token');
         $this->validate($request, [
            'name' => 'required | min:3',
            'email' => 'required| email | unique:suppliers',
            'phone' => 'required | unique:suppliers',
            'address' => 'required',
            'city' => 'required',
            'photo' => 'required | image',
            'type' => 'required | integer',
        ]);
 //dd($inputs);
          // Upload the image
        if ($request->hasFile('photo')) {
            $photo = $request->photo;
            $photo->move('supplier', $photo->getClientOriginalName());
        }
       

        $supplier = new Supplier();
        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->phone = $request->input('phone');
        $supplier->address = $request->input('address');
        $supplier->city = $request->input('city');
        $supplier->type = $request->input('type');
        $supplier->shop_name = $request->input('shop_name');
        $supplier->account_holder = $request->input('account_holder');
        $supplier->account_number = $request->input('account_number');
        $supplier->bank_name = $request->input('bank_name');
        $supplier->bank_branch = $request->input('bank_branch');
        $supplier->photo = $request->photo->getClientOriginalName();
        $supplier->save();

        return redirect()->route('backend.supplier.list')->with('success_message', 'You are successfully created');
       
    }
     public function show(Supplier $supplier,$id)
    {
    	$supplier = Supplier::where('id',$id)->first();
    	//dd($supplier,$id);
        return view('backend.supplier.show', compact('supplier'));
    }
     public function edit(Supplier $supplier, $id)
    {
    	$supplier = Supplier::where('id',$id)->first();
        return view('backend.supplier.edit', compact('supplier'));
    }

     public function update(Request $request)
    {
        $inputs = $request->except('_token');
       // dd($inputs);
        $this->validate($request, [
             'name' => 'required | min:3',
            'email' => 'required| email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
           // 'photo' => 'image',
            'type' => 'required | integer',
        ]);

         if ($request->hasFile('photo')) {
            $photo = $request->photo;
            $photo->move('supplier', $photo->getClientOriginalName());
            $image=$request->photo->getClientOriginalName();
        }else{
        	$image=$request->input('photoold');
        }
        $supplier = Supplier::where('id',$request->input('supplier_id'))->first();
        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->phone = $request->input('phone');
        $supplier->address = $request->input('address');
        $supplier->city = $request->input('city');
        $supplier->type = $request->input('type');
        $supplier->shop_name = $request->input('shop_name');
        $supplier->account_holder = $request->input('account_holder');
        $supplier->account_number = $request->input('account_number');
        $supplier->bank_name = $request->input('bank_name');
        $supplier->bank_branch = $request->input('bank_branch');
        $supplier->photo = $image;
        $supplier->update();
		return redirect()->route('backend.supplier.list')->with('success_message', 'Supplier Successfully Updated');
        
    }
     public function destroy(Supplier $supplier,$id)
    {
    	//dd($id);
       
        $supplier = Supplier::where('id',$id)->first();
        $supplier->delete();
        
       return redirect()->route('backend.supplier.list')->with('success_message', 'Supplier Successfully Deleted');
    }
}
