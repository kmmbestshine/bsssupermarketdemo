<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;

class AttendanceController extends Controller
{

	 public function index()
    {
        $dates = Attendance::latest('date')->get();
       // dd($dates);
       // $cust_id= Customer::latest('id')->first();
        return view('backend.attendance.index', compact('dates'));
    }

     public function create()
    {
        $employees = User::all();
       // dd($employees);
        return view('backend.attendance.create', compact('employees'));
    }

     public function store(Request $request)
    {
        $inputs = $request->except('_token');
        $rules = [
          'attendance' => 'required',
        ];

        //$validator = Validator::make($inputs, $rules);
       // if ($validator->fails())
       // {
         //   return redirect()->back()->withErrors($validator)->withInput();
     //   }

        $date = date('Y-m-d');
        $att_date = Attendance::select('date')->where('date', $date)->first();

        if (!$att_date)
        {
            foreach ($request->employee_id as $emp_id) {

                $attendance = new Attendance();
                $attendance->employee_id = $emp_id;
                $attendance->attendance = $request->attendance[$emp_id];
                $attendance->date = date('Y-m-d');
                $attendance->month = strtolower(date('F'));
                $attendance->year = date('Y');
                $attendance->save();
            }

            return redirect()->route('backend.attendance.index')->with('success_message', 'You are successfully created');

        } else {
             return redirect()->route('Attendance.attendance.create')->with('error_message', 'can not created at this time ');
        }
    }

    public function show($date)
    {
        $attendances = Attendance::where('date', $date)->with('employee')->get();
        //dd($attendances);
        return view('backend.attendance.show', compact('attendances', 'date'));
    }
     public function edit($date)
    {
        $attendances = Attendance::where('date', $date)->with('employee')->get();
       // dd($attendances);
        return view('backend.attendance.edit', compact('attendances', 'date'));
    }
    public function att_update(Request $request)
    {
    	dd($request);
        foreach ($request->id as $att_id) {

            $up_attendance = $request->attendance[$att_id];

            $attendance = Attendance::where('id', $att_id)->first();
            $attendance->attendance = $up_attendance;
            $attendance->save();
        }

        return redirect()->route('backend.attendance.index')->with('success_message', 'You are successfully Updated');
    }
    public function destroy($date)
    {
        $attendances = Attendance::where('date', $date)->get();
        foreach ($attendances as $attendance)
        {
            $attendance->delete();
        }

        return redirect()->route('backend.attendance.index')->with('success_message', 'You are successfully Deleted');

    }
}


