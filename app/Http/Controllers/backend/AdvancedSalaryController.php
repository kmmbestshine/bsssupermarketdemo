<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advanced_Salary;
use App\Models\User;
use DB;

class AdvancedSalaryController extends Controller
{
	public function index()
    {
        $advanced_salaries = DB::table('advanced_salaries')->latest('advanced_salaries.employee_id')
        ->join('users', 'advanced_salaries.employee_id', '=', 'users.id')
        ->get();
       // dd($advanced_salaries);
        return view('backend.advanced_salary.index', compact('advanced_salaries'));
    }
    public function create()
    {
        $employees = User::all();
       // dd($employees);
        return view('backend.advanced_salary.create', compact('employees'));
    }

    public function store(Request $request)
    {
       

        $this->validate($request, [
            'employee_id' => 'required',
            'month' => 'required',
            'year' => 'required',
            'advanced_salary' => 'required',
        ]);
       

        $advanced_salary = DB::table('advanced_salaries')->where('employee_id', $request->employee_id)->where('month', $request->month)->where('year', $request->year)->first();
       // dd($advanced_salary);
        if (!$advanced_salary)
        {
            
             DB::table('advanced_salaries')->insert(
                array(
                'employee_id' => $request->input('employee_id'),
                'month' => $request->input('month'),
                'year' => $request->input('year'),
                'advanced_salary' => $request->input('advanced_salary'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                
                ));
            
            return redirect()->route('Advsalary.advsalary.create')->with('success_message', 'Advanced Salary Successfully Paid', 'Success!!!');

        } else {
           
            return redirect()->route('Advsalary.advsalary.create')->with('error_message', 'Advanced salary already paid for the employee', 'Error!!!');
        }


    }
}
