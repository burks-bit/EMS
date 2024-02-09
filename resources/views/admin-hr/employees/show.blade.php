@extends('layouts.app')
@section('title', 'Employees')
@section('content')
<style type="text/css">
    #popup{
        display: none;
    }
    </style>
    <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> -->
<table style="width:100%;">
    <thead> 
        <tr>
            <td style="text-align:left;"><h4>Employee Details</h4><td>
            <td style="text-align:right;">
                <a href="/admin-hr/employees"><i class="fa-solid fa-table-list fa-lg"></i></a>
            <td>
        </tr>    
    <thead>
</table>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">User Login Detail</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="employment-tab" data-toggle="tab" href="#employmentDetail" role="tab" aria-controls="employmentDetail" aria-selected="false">Employment Details</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <br>
    <input type="hidden" value="{{ $employee_details->id }}" id="empID">
    <table class="table table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Complete Name</th>
                <th scope="col">Age / Sex</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Address</th>
                <th scope="col">Civil Status</th>
                <th scope="col">Contact No.</th>
                <th scope="col">Religion</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <br>
    <table class="table table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Employee ID</th>
                <th scope="col">Username</th>
                <th scope="col">Complete Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Date Registered</th>
            </tr>
        </thead>
        <tbody id="userlogindata">
            
        </tbody>
    </table>
    </div>
    <div class="tab-pane fade" id="employmentDetail" role="tabpanel" aria-labelledby="profile-tab">
    <br>
    <table class="table table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col">Employee ID No.</th>
                <th scope="col">Date Hired</th>
                <th scope="col">Employment Status</th>
            </tr>
        </thead>
        
    </table>
    </div>
</div>

<!-- Edit Employee details Modal -->
<div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="editEmployeeModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="updateform_errlist"></p>
                <input type="hidden" class="form-control popup_emp_id" id="popup_emp_id">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control fname" id="fname">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Middle Name</label>
                            <input type="text" class="form-control mname" id="mname">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control lname" id="lname">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date of Birth</label>
                            <input type="text" class="form-control dob" id="dob">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sex</label>
                            <select class="custom-select sex" id="sex">
                                <option selected>Choose</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Age</label>
                            <input type="text" class="form-control age" id="age">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <textarea class="form-control address" style="resize:none;" id="address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Civil Status</label>
                            <select class="custom-select civilstatus" id="civilstatus">
                                <option selected>Choose</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widower">Widower</option>
                                <option value="Legally Separated">Legally Separated</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact No.</label>
                            <input type="text" class="form-control contactno" id="contactno">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Religion</label>
                            <select class="custom-select religion" id="religion">
                                <option selected>Choose</option>
                                <option value="Roman Catholic">Roman Catholic</option>
                                <option value="Born Again">Born Again</option>
                                <option value="Iglesia ni Kristo">Iglesia ni Kristo</option>
                                <option value="Mormons">Mormons</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm btn-close" data-dismiss="modal"><i class="fa-regular fa-circle-xmark fa-lg"></i> Close</button>
                <button type="button" class="btn btn-primary btn-sm update_employee_detail"><i class="fa-regular fa-floppy-disk fa-lg"></i> Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Employee details Modal -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="successmodal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Success!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="successmessages"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm btn-close" data-dismiss="modal"><i class="fa-regular fa-circle-xmark fa-lg"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Create User Login Credential Modal -->
<div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="createUserLoginModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create User Login Credential</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="createuserloginerr"></p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control tosaveusername" id="tosaveusername" readonly>
                            <input type="hidden" class="form-control tosaveemployeeid" id="tosaveemployeeid">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Complete Name</label>
                            <input type="text" class="form-control tosavecompletename" id="tosavecompletename" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control tosaveemail" id="tosaveemail">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" class="form-control tosavepassword" id="tosavepassword">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role</label>
                            <select class="custom-select tosaverole" id="tosaverole">
                                <option selected>Choose</option>
                                <option value="1">Admin</option>
                                <option value="2">Employee</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm btn-close" data-dismiss="modal"><i class="fa-regular fa-circle-xmark fa-lg"></i> Close</button>
                <button type="button" class="btn btn-primary btn-sm saveUserLogin"><i class="fa-regular fa-floppy-disk fa-lg"></i> Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

    function deleteEmployeeProfile(value){
        alert(value);
    }

    getEmployeeData();
    function getEmployeeData(){
        var emp_id = $('#empID').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: 'GET',
            url: '/get_employee_data/'+emp_id,
            dataType: 'json',
            success: function (response){
                //console.log(response.employees);
                $('tbody').html("");
                $.each(response.employees, function(key, item) {
                    $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.last_name+ ', ' +item.first_name+ ' ' +item.middle_name+'</td>\
                            <td>'+item.age+ ' / '+item.sex+'</td>\
                            <td>'+item.birthdate+'</td>\
                            <td>'+item.address+'</td>\
                            <td>'+item.civil_status+'</td>\
                            <td>'+item.contact_no+'</td>\
                            <td>'+item.religion+'</td>\
                            <td>\
                                <a href="#" class="text-success edit_employee" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>&ensp;\
                                <a href="/admin-hr/employees/delete/'+item.id+'" class="text-danger"><i class="fa-regular fa-trash-can fa-lg"></i></a>\
                            </td>\
                        </tr>');
                });
            }
        });
    }

    fetch_recently_created_user_login();
    function fetch_recently_created_user_login(){
        $(document).on('click', '#profile-tab', function(e){
            var emp_id = $('#empID').val();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'get',
                url: '/checkCreds/'+emp_id,
                dataType: 'json',
                success:function(response){
                    if(response.status == 404){
                        console.log(response);
                        $('#userlogindata').html('');
                        $('#createUserLoginModal').modal('show');
                        $('#tosaveemployeeid').val(response.EmpData[0].id);
                        $('#tosaveusername').val(response.EmpData[0].first_name);
                        $('#tosavecompletename').val(response.EmpData[0].first_name+' '+response.EmpData[0].middle_name+' '+response.EmpData[0].last_name);
                        $('#tosaveemail').val();
                    } else {
                        console.log(response.user_data);
                        $('#userlogindata').html('');
                        $.each(response.user_data, function(key, userData) {
                            $('#userlogindata').append('<tr>\
                                    <td>'+userData.id+'</td>\
                                    <td>'+userData.employee_id+'</td>\
                                    <td>'+userData.username+'</td>\
                                    <td>'+userData.name+'</td>\
                                    <td>'+userData.email+'</td>\
                                    <td>'+userData.role+'</td>\
                                    <td>'+userData.created_at+'</td>\
                                </tr>');
                        });
                    }
                }
            });
        });
    }

    $(document).ready(function(){

        $(document).on('click', '.saveUserLogin', function(e){
            var empid = $('#tosaveusername').val();
            var data = {
                'empid': $('#tosaveemployeeid').val(),
                'uname': $('#tosaveusername').val(),
                'name': $('#tosavecompletename').val(),
                'email': $('#tosaveemail').val(),
                'password': $('#tosavepassword').val(),
                'role': $('#tosaverole').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/admin-hr/employees/create_user_login',
                data: data,
                dataType: 'json',
                success:function(response){
                    if(response.status == 400){
                        $('#createuserloginerr').html('');
                        $.each(response.errors, function (key, err_values){
                            $('#createuserloginerr').append('<li class="text-danger">'+err_values+'</li>');
                        });
                    } else {
                        console.log(response);
                        $('#createUserLoginModal').modal('hide');
                        $('#successmodal').modal('show');
                        $('#createUserLoginModal').find('input').val('');
                        $('#createUserLoginModal').find('select').val('');
                        $('#successmessages').text(response.message);
                        fetch_recently_created_user_login();
                    }
                }
            });
            
        });


        $(document).on('click', '.edit_employee', function(e){
            e.preventDefault();
            var emp_id = $('#empID').val();
            $('#editEmployeeModal').modal('show');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'get',
                url: '/get_emp_data/'+emp_id,
                success:function(response){
                    if(response.status == 404){
                        alert(response.message);
                    } else {
                        console.log(response.employees[0]);
                        $('#popup_emp_id').val(response.employees[0].id);
                        $('#fname').val(response.employees[0].first_name);
                        $('#mname').val(response.employees[0].middle_name);
                        $('#lname').val(response.employees[0].last_name);
                        $('#age').val(response.employees[0].age);
                        $('#sex').val(response.employees[0].sex);
                        $('#dob').val(response.employees[0].birthdate);
                        $('#address').val(response.employees[0].address);
                        $('#civilstatus').val(response.employees[0].civil_status);
                        $('#contactno').val(response.employees[0].contact_no);
                        $('#religion').val(response.employees[0].religion);
                    }
                }
            });
        });

        $(document).on('click', '.update_employee_detail', function(e){
            e.preventDefault();
            var emp_id = $('#popup_emp_id').val();
            var data = {
                'firstname': $('#fname').val(),
                'middlename': $('#mname').val(),
                'lastname': $('#lname').val(),
                'dateofbirth': $('#dob').val(),
                'sex': $('#sex').val(),
                'age': $('#age').val(),
                'address': $('#address').val(),
                'civilstatus': $('#civilstatus').val(),
                'contactno': $('#contactno').val(),
                'religion': $('#religion').val(),
            }
            $.ajax({
                type: 'put',
                url: '/update_emp/'+emp_id,
                data: data,
                dataType: 'json',
                success:function(response){
                    console.log(response);
                    if(response.status == 400){
                        $('#updateform_errlist').html('');
                        $.each(response.errors, function (key, err_values){
                            $('#updateform_errlist').append('<li class="text-danger">'+err_values+'</li>');
                        });
                    } else if(response.status == 404) {
                        $('#updateform_errlist').html('');
                        $('#success_message').text(response.message);
                    } else {
                        $('#updateform_errlist').html('');
                        $('#editEmployeeModal').modal('hide');
                        $('#successmodal').modal('show');
                        getEmployeeData();
                    }
                }
            });
        });

        $(document).on('click', '#employment-tab', function (e)  {
            e.preventDefault();

            var emp_id = $('#empID').val();
            console.log(emp_id);
            $.ajax({
                type: 'get',
                url: '/getEmploymentDetails/'+emp_id,
                dataType: 'json',
                success:function(response){
                    console.log(response);
                }
            });
            

        });

    });
</script>
@endsection

