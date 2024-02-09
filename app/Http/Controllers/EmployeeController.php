<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = 'Sample';
        return view('admin-hr/employees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-hr/employees.create');
    }

    //public function create_user_login(){
    //    $users = DB::select('select * from employees');
    //    foreach ($users as $user) {
    //        echo $user->name;
    //    }
    //    return "dsa";
    //}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname'=>'required|max:115',
            'middlename'=>'required|max:115',
            'lastname'=>'required|max:115',
            'dateofbirth'=>'required|max:115',
            'sex'=>'required|max:115',
            'age'=>'required|max:115',
            'address'=>'required|max:115',
            'civilstatus'=>'required|max:115',
            'contactno'=>'required|max:115',
            'religion'=>'required|max:115'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        } else {
            $formattedDateofBirth = date('Y-m-d', strtotime($request->dateofbirth));
            $employee = new Employee;
            $employee->first_name = $request->firstname;
            $employee->middle_name = $request->middlename;
            $employee->last_name = $request->lastname;
            $employee->birthdate = $formattedDateofBirth;
            $employee->sex = $request->sex;
            $employee->age = $request->age;
            $employee->address = $request->address;
            $employee->religion = $request->religion;
            $employee->contact_no = $request->contactno;
            $employee->civil_status = $request->civilstatus;
            $saveEmployeeData = $employee->save();

            if($saveEmployeeData){
                return response()->json([
                    'status'=>200
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $employee_details = Employee::find($employee)->first();
        return view('admin-hr/employees.show', compact(['employee_details', $employee_details]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $employees = Employee::find($employee);
        if($employees){
            return response()->json([
                'status'=>200,
                'employees'=>$employees,
            ]);
        } else {
            return response()->json([
                'status'=>404,
                'message'=>'Employee Not Found.',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {   
        Log::channel('custom')->info($employee);
        $validator = Validator::make($request->all(), [
            'firstname'=>'required|max:115',
            'middlename'=>'required|max:115',
            'lastname'=>'required|max:115',
            'dateofbirth'=>'required|max:115',
            'sex'=>'required|max:115',
            'age'=>'required|max:115',
            'address'=>'required|max:115',
            'civilstatus'=>'required|max:115',
            'contactno'=>'required|max:115',
            'religion'=>'required|max:115',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        } else {
            $formattedDateofBirth = date('Y-m-d', strtotime($request->dateofbirth));
            $employee_tbl = Employee::find($employee->id);
            if($employee_tbl){
                $employee_tbl->first_name = $request->firstname;
                $employee_tbl->middle_name = $request->middlename;
                $employee_tbl->last_name = $request->lastname;
                $employee_tbl->birthdate = $formattedDateofBirth;
                $employee_tbl->sex = $request->sex;
                $employee_tbl->age = $request->age;
                $employee_tbl->address = $request->address;
                $employee_tbl->religion = $request->religion;
                $employee_tbl->contact_no = $request->contactno;
                $employee_tbl->civil_status = $request->civilstatus;
                $saveEmployeeData = $employee_tbl->update();

                if($saveEmployeeData){
                    return response()->json([
                        'status'=>200,
                        'message'=>'Detail Successfully updated.',
                    ]);
                }
            } else {
                return response()->json([
                    'status'=>404,
                    'message'=>'Employee Detail canoot update. Please contact your administrator.',
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function get_employee_data(Employee $employee){
        $employees = Employee::find($employee);
        if($employees){
            return response()->json([
                'status'=>200,
                'employees'=>$employees,
            ]);
        } else {
            return response()->json([
                'status'=>404,
                'message'=>'Employee Not Found.',
            ]);
        }
    }
    
    public function get_added_employees(){

        //to put this on index function by default and limit to 15 entries ang paginate
        $employees = Employee::all();
        return response()->json([
            'employees'=>$employees,
        ]);
    }
    
    public function create_user_login(Request $request){

        $validator = Validator::make($request->all(), [
            'empid'=>'required|max:115',
            'uname'=>'required|max:115',
            'name'=>'required|max:115',
            'email'=>'required|email|max:115',
            'password'=>'required|max:115',
            'role'=>'required|max:115',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        } else {
            
            $user_tbl = new User;
            $user_tbl->employee_id = $request->empid;
            $user_tbl->username = $request->uname;
            $user_tbl->name = $request->name;
            $user_tbl->email = $request->email;
            $user_tbl->password = Hash::make($request->password);
            $user_tbl->role = $request->role;
            $saveUserLoginCreds = $user_tbl->save();

            if($saveUserLoginCreds){
                return response()->json([
                    'status'=>200,
                    'message'=>'Login credential for this employee successfully created.'
                ]);
            }
        }
    }
    
    public function get_user_login(Employee $employee){
        $UserData = User::where('employee_id', $employee->id)->get(['id', 'employee_id','username', 'name','email', 'role','created_at']);
        Log::channel('custom')->info($UserData);
        if($UserData->isNotEmpty()){
            return response()->json([
                'status'=>200,
                'user_data'=>$UserData
            ]);
        } else {
            $EmpData = Employee::where('id', $employee->id)->get(['id', 'first_name','middle_name', 'last_name']);
            Log::channel('custom')->info($employee);
            return response()->json([
                'status'=>404,
                'EmpData'=>$EmpData,
                'message'=>'Employee doesnt have user login credential yet.',
            ]);
        }
    }
}
