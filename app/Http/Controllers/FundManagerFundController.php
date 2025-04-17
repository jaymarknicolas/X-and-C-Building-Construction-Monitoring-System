<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Project;
use App\Models\EmployeeName;
use App\Models\Refund;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;

class FundManagerFundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
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

        $this->validate($request, [
            'amount' => 'required',
            'employee_id' => 'required',
            'project_id' => 'required'
        ]);


        $refund = new Refund;
        $refund->amount = $request->input('amount');
        $refund->employee_name_id = $request->input('employee_id');
        $refund->project_id = $request->input('project_id');
        $refund->admin_id = Auth()->user()->id;
        $refund->save();

        $log = new Log;
        $log->user_id = Auth()->user()->user_type;
        $log->log_type = 1;
        $log->affected_table = "Fund";
        $log->description = "Add new fund information";
        $log->save();

        return redirect('/fund_manager/projects/'.$request->input('project_id'))->with('success', 'Fund Inserted Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
