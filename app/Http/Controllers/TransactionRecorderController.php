<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Client;
use App\Models\EmployeeName;

class TransactionRecorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $log = new Log;
        $log->user_id = Auth::user()->user_type;
        $log->log_type = 0;
        $log->affected_table = "Dashboard";
        $log->description = "User login | Access Dashboard";
        $log->save();

        $projects = Project::all();
        $ongoingProjects = Project::select('*')->where('status', 1)->get();

        $clients = Client::all();

        $employees = EmployeeName::all();

        $completeProjects = Project::select('*')->where('status', 2)->get();
        
        $inProgressProjects = Project::select('*')->where('status', 1)->get();

        return view('transaction-recorder.dashboard')
        ->with('projects', $projects)
        ->with('ongoingProjects', $ongoingProjects)
        ->with('employees', $employees)
        ->with('completeProjects', $completeProjects)
        ->with('inProgressProjects', $inProgressProjects)
        ->with('clients', $clients);
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
