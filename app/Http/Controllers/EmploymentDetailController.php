<?php

namespace App\Http\Controllers;

use App\Models\EmploymentDetail;
use Illuminate\Http\Request;

class EmploymentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmploymentDetail  $employmentDetail
     * @return \Illuminate\Http\Response
     */
    public function show(EmploymentDetail $employmentDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmploymentDetail  $employmentDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(EmploymentDetail $employmentDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmploymentDetail  $employmentDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmploymentDetail $employmentDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmploymentDetail  $employmentDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmploymentDetail $employmentDetail)
    {
        //
    }

    public function get_employment_details(EmploymentDetail $employmentDetail){
        $employmentDtls = array([
            'employee_id' => 3,
            'date_hired' => '01-01-2023',
            'employment_status' => 'Employed',

        ]);
        return response()->json([
            'status'=>200,
            'employmentDtls'=>$employmentDtls,
        ]);
    }
}
