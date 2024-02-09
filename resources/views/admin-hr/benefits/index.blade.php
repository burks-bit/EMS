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
            <td style="text-align:left;"><h4><?php echo ucfirst(Request::segment(2)); ?></h4><td>
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
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@endsection

