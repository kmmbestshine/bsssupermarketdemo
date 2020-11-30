<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Customer;

use Rule;
use Validator;
use Redirect;

class CustomerController extends Controller
{
   public function index()
	{
		$this->checkpermission('customer-list');
		$customers = Customer::paginate(10);
		return view('backend.customers.customers_list', compact('customers'));
	}
	public function create()
	{
		$this->checkpermission('customer-create');
		return view('backend.customers.create_customer');
	}

	public function store(Request $request)
	{
		$input = \Request::all();
		
		
        //dd($input,$request);
        $customer = new Customer();
         $customer->name = $request->name;
        $customer->gstin = $request->gstin;
        $customer->country = $request->country;
        $customer->state = $request->state;
         $customer->person = $request->person;
        $customer->mobile = $request->mobile;
        $customer->pan = $request->pan;
        $customer->address = $request->address;
        $customer->pincode = $request->pincode;
        $customer->city = $request->city;
        $customer->email = $request->email;
        $customer->created_at = date('Y-m-d H:i:s');
        if ($customer->save()) {
            return back()->with('success_message', 'Success Fully created');
        } else {
            return back()->with('error_message', 'Failed To create');
        }

		
	}

	public function show($id)
	{
		$this->checkpermission('customer-show');
		$contact = Customer::find($id);
		//dd($contact);
        return view('backend.customers.customer_view', compact('contact'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$this->checkpermission('customer-edit');
		$contact = Customer::find($id);
		//dd($contact);
        return view('backend.customers.customer_edit', compact('contact'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$rules = array(
			'name'		=> 'required|string|max:255',
			'gstin'     => 'required|regex:/\d{2}[a-zA-Z]{5}\d{4}[a-zA-Z]{1}[0-9]{1}[zZ][0-9]{1}/',
			'country'   => 'required',
			'state'		=> 'required',
			'person'	=> 'required',
			'mobile'    => 'required|unique:contacts,mobile,'.$id,
			'pan'      	=> 'nullable',
			'address'   => 'required',
			'pincode'   => 'required',
			'city'      => 'required',
			'email'		=> 'required|string|email|max:255|unique:contacts,email,'.$id,
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			
			// Redirecting
			toast('Rectify errors and re-submit!','error','top-right')->autoclose(3500);
			return Redirect::to('contacts/' . $id . '/edit')
				->withErrors($validator)
				->withInput($request->input());

		} else {

			Contact::whereId($id)->update($request->except('_token', '_method'));
			// Redirecting
			toast('Contact Updated Successfully!','success','top-right')->autoclose(3500);
			return Redirect::to('contacts');
		}
	}
}
