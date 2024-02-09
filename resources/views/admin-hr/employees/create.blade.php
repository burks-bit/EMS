@extends('layouts.app')

@section('content')
<table style="width:100%;">
    <thead>
        <tr>
            <td style="text-align:left;"><h4>Register Employee</h4><td>
            <td style="text-align:right;"><a href="/admin-hr/employees" >List</a><td>
        </tr>    
    <thead>
</table>
<input type="text" id="inputText" class="form-control">
<button id="button" onclick="button()">Click me</button>
@endsection

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function button(){
        var inputtypetext = $('#inputText').val();
        
        $('input').trigger('reset');
                console.log(inputtypetext);
        // $.ajax({
        //     url: '/admin-hr/employees/postdata',
        //     method: 'get',
        //     data: {
        //         textValue: inputtypetext
        //     },
        //     success:function(inputtypetext){
        //         $('input').trigger('reset');
        //         console.log(inputtypetext);
        //     }
        // });
    }
</script>