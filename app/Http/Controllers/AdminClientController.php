<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class AdminClientController extends Controller
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
        return view('clients.index');
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
            'client_name' => 'required',
            'company_name' => 'required',
            'owner_name' => 'required',
            'contact_details' => 'required|min:11|unique:clients'
        ]);


        $client = new Client;
        $client->client_name = $request->input('client_name');
        $client->company_name = $request->input('company_name');
        $client->owner_name = $request->input('owner_name');
        $client->contact_details = $request->input('contact_details');
        $client->save();

        $log = new Log;
        $log->user_id = Auth()->user()->id;
        $log->log_type = 1;
        $log->affected_table = "Client";
        $log->description = "Add new client information";
        $log->save();

        return redirect($request->input('redirect'))->with('success', 'Client Added Successfully!');
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
