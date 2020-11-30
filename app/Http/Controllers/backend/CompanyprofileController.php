<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Companyprofile;
use Illuminate\Http\UploadFile;
Use Validator;
use Storage;

class CompanyprofileController extends Controller
{
    public function index()
    {
		$setting = Companyprofile::find(1);

		//dd('kkkkkk',$setting);

        return view('backend.companyprofile.companyprofile', compact('setting'));
    }
    public function update(Request $request, $id)
    {

        $rules = array(
			'businessName'	=> 'required|string|max:255',
			'gstin'         => 'required|regex:/\d{2}[a-zA-Z]{5}\d{4}[a-zA-Z]{1}[0-9]{1}[zZ][0-9]{1}/',
			'panNumber'     => 'required|regex:/[a-zA-Z]{5}\d{4}[a-zA-Z]{1}/',
			'address'     	=> 'required',
			'placeOfOrigin'	=> 'required',
			'profileLogo'	=> 'image|nullable|max:1999',
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			
			

			return redirect()->route('profile.create')
				->withErrors($validator)
				->withInput($request->input());

		} else {

			if($request->has('profileLogo')){

				$extension = $request->file('profileLogo')->extension();
				$filenameToStore = 'profileLogo'.'_'.time().'.'.$extension;
				$path = $request->file('profileLogo')->storeAs('public/companyprofile', $filenameToStore);

			}

			$request->request->add(['logoPath' => $filenameToStore]);

            Companyprofile::whereId($id)->update($request->except('_token', '_method', 'profileLogo'));

			// redirect
			toast('Settings Updated Successfully!','success','top-right')->autoclose(3500);
			return redirect()->route('profile.create');
		}
    }
}
