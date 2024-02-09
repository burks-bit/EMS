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
            <td id="success_message" colspan="2"><td>
        </tr>  
        <tr>
            <td style="text-align:left;"><h4>Employees</h4><td>
            <td style="text-align:right;">
                <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa-solid fa-user-plus fa-lg"></i></a>
            <td>
        </tr>    
    <thead>
</table>
<table class="table table-sm">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Complete Name</th>
            <th scope="col">Age / Sex</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>

<!-- Add Employee Modal -->
<div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addEmployeeModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="saveform_errlist"></p>
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
                            <input type="text" class="form-control dob" id="dob" maxlength="10"  onkeydown="this.value=this.value.replace(/^(\d\d)(\d)$/g,'$1/$2').replace(/^(\d\d\/\d\d)(\d+)$/g,'$1/$2').replace(/[^\d\/]/g,'')">
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
                            <input type="text" class="form-control age" id="age" name="age" onmousemove="findAge()" readonly>
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
                <!-- <button type="button" class="btn btn-success btn-sm" onclick="displayData()"><i class="fa-solid fa-arrow-down fa-lg"></i> Append Data</button> -->
                <button type="button" class="btn btn-secondary btn-sm btn-close" onclick="btnClose()" data-dismiss="modal"><i class="fa-regular fa-circle-xmark fa-lg"></i> Close</button>
                <button type="button" class="btn btn-primary btn-sm add_employee"><i class="fa-regular fa-floppy-disk fa-lg"></i> Save</button>
            </div>
        </div>
    </div>
</div>

<!-- success modal -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="successmodalsave">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                New Employee Added!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa-regular fa-circle-xmark fa-lg"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

    $(function(){
        $( "#dob" ).datepicker();
    });

    function btnClose(){
        $('#addEmployeeModal').find('input').val('');
        $('#addEmployeeModal').find('textarea').val('');
        $('#addEmployeeModal').find('select').val('');
    }

    //function displayData(){
    //    document.getElementById("fname").value = 'Albert';
    //    document.getElementById("mname").value = 'Serrano';
    //    document.getElementById("lname").value = 'Garcia';
    //    document.getElementById("age").value = '26';
    //    document.getElementById("sex").value = 'Male';
    //    document.getElementById("address").value = 'Diliman, Quezon City';
    //    document.getElementById("civilstatus").value = 'Single';
    //    document.getElementById("religion").value = 'Roman Catholic';
    //    document.getElementById("dob").value = '04/08/1997';
    //    document.getElementById("contactno").value = '09652845007';
    //}

    function findAge(){
        var day = document.getElementById('dob').value;
        var dob = new Date(day);
        var today = new Date();
        var Age = today.getTime() - dob.getTime();
        Age = Math.floor( Age / (1000 * 60 * 60 * 24 * 365.25));
        document.getElementById('age').value = Age;
    }

    $(document).ready(function(){

        fetchEmployees();
        function fetchEmployees(){
            $.ajax({
                type: 'GET',
                url: '/get_employees',
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
                                <td>\
                                    <a href="/admin-hr/employees/edit/'+item.id+'" class="text-success"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>&ensp;\
                                    <a href="/admin-hr/employees/show/'+item.id+'" class="text-primary"><i class="fa-regular fa-eye fa-lg"></i></a>&ensp;\
                                    <a href="/admin-hr/employees/delete/'+item.id+'" class="text-danger"><i class="fa-regular fa-trash-can fa-lg"></i></a>\
                                </td>\
                            </tr>');
                    });
                }
            });
        }

        $(document).on('click', '.add_employee', function(e){
            e.preventDefault();
            var data = {
                'firstname': $('.fname').val(),
                'middlename': $('.mname').val(),
                'lastname': $('.lname').val(),
                'dateofbirth': $('.dob').val(),
                'sex': $('.sex').val(),
                'age': $('.age').val(),
                'address': $('.address').val(),
                'civilstatus': $('.civilstatus').val(),
                'contactno': $('.contactno').val(),
                'religion': $('.religion').val(),
            }
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/admin-hr/employees/add_employee',
                data: data,
                dataType: 'json',
                success: function (response){
                    console.log(response);
                    if(response.status == 400){
                        $('#saveform_errlist').html('');
                        $.each(response.errors, function (key, err_values){
                            $('#saveform_errlist').append('<li class="text-danger">'+err_values+'</li>');
                        });
                    } else {
                        $('#saveform_errlist').html('');
                        $('#addEmployeeModal').modal('hide');
                        $('#addEmployeeModal').find('input').val('');
                        $('#addEmployeeModal').find('textarea').val('');
                        $('#addEmployeeModal').find('select').val('');
                        $('#successmodalsave').modal('show');
                        fetchEmployees();
                    }
                }
            });

        });
    });
</script>
@endsection

