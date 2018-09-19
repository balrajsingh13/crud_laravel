<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::get();
        return view('home', compact ('data'));
    }

    public function getID($id){
        //echo $id;die;
        $data = Employee::all()->where('emp_ID', $id)->first();
        $data_email = User::all()->where('id', $id)->first();
        return view('edit',compact('data','data_email'));
    }

    public function edit(Request $request, $id){
        $name = $request->input('name');
        $email = $request->input('email');
        $contactNo = $request->input('contactNo');
        $password = bcrypt($request->input('password'));
        $city = $request->input('city');
        $depatment = $request->input('department');
        $designation = $request->input('designation');
        $eORa = $request->input('eORa');
        Employee::where('emp_ID', $id)
                    ->update(['emp_name' => $name, 
                              'emp_contact' => $contactNo,
                              'city' => $city,
                              'dept_ID' => $depatment,
                              'desig_ID' => $designation,
                              'eORa' => $eORa,
                              'password' => $password]);
            
        User::where('id', $id)
                    ->update(['name' => $name,
                              'email' => $email,
                              'password' => $password]);
        $data = Employee::get();
        return view('home', compact ('data'));
    }

    public function deleteUser($id)
    {
        if($id != null){
            Employee::where('emp_ID', $id)->delete();
            User::where('id', $id)->delete();
            $data = Employee::get();
            return view('home', compact ('data'));
        }
    }
}
