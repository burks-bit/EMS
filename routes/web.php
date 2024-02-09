<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('admin-hr',function(){
    return view('admin-hr.index');
})->name('admin')->middleware('admin');

Route::get('employee',function(){
    return view('employee.index');
})->name('employee')->middleware('employee');

route::group(['middleware'=> ['admin']], function(){
    
    Route::resource('/admin-hr/employees', 'EmployeeController');
    Route::get('/admin-hr/employees/show/{employee}', 'EmployeeController@show');
    Route::post('/admin-hr/employees/add_employee', 'EmployeeController@store');
    Route::post('/admin-hr/employees/create_user_login', 'EmployeeController@create_user_login');
    Route::get('get_emp_data/{employee}', 'EmployeeController@edit');
    Route::put('update_emp/{employee}', 'EmployeeController@update');
    Route::get('get_employee_data/{employee}', 'EmployeeController@get_employee_data');
    Route::get('get_employees', 'EmployeeController@get_added_employees');
    Route::get('checkCreds/{employee}', 'EmployeeController@get_user_login');

    Route::get('getEmploymentDetails/{employmentDetail}', 'EmploymentDetailController@get_employment_details');
    
    Route::resource('/admin-hr/benefits', 'BenefitController');

});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
