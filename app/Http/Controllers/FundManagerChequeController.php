<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cheque;
use App\Models\Refund;
use App\Models\EmployeeName;
use App\Models\Purchase;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;


class FundManagerChequeController extends Controller 
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
        $cheques = Cheque::where('user_id', Auth()->user()->id)->get();

        $log = new Log;
        $log->user_id = Auth()->user()->user_type;
        $log->log_type = 0;
        $log->affected_table = "Cheque";
        $log->description = "Access Cheque Table";
        $log->save();

        return view('fund-manager.cheques.index')->with('cheques', $cheques);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $employee_names = EmployeeName::all();



        return view('fund-manager.cheques.create')->with('employee_names', $employee_names);
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
            'cheque_number' => 'required|unique:cheques',
            'amount' => 'required',
            'transaction_date' => 'required',
            'employee_id' => 'required' 
        ]);

        $cheque = new Cheque;
        $cheque->datetime = $request->input('transaction_date');
        $cheque->amount = $request->input('amount');
        $cheque->cheque_number = $request->input('cheque_number');
        $cheque->employee_name_id = $request->input('employee_id');
        $cheque->user_id = Auth()->user()->id;
        $cheque->save();


        $log = new Log;
        $log->user_id = Auth()->user()->user_type;
        $log->log_type = 1;
        $log->affected_table = "Cheque";
        $log->description = "Add new cheque information";
        $log->save();

        return redirect('/fund_manager/cheques')->with('success', 'Cheque Information Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cheque = Cheque::find($id);
        // return $cheque->id;

        $purchases = Purchase::select('*')->where('cheque_id', $cheque->id)->get();


        $totalExpenses = 0;

        foreach($purchases as $purchase) {
            $totalExpenses += $purchase->amount;
        }

        // return $totalExpenses;
        $log = new Log;
        $log->user_id = Auth()->user()->user_type;
        $log->log_type = 0;
        $log->affected_table = "Cheque";
        $log->description = "Show cheque information";
        $log->save();

         return view('fund-manager.cheques.show')
         ->with('cheque', $cheque)
         ->with('totalExpenses', $totalExpenses)
         ->with('purchases', $purchases);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee_names = EmployeeName::all();
        $cheque = Cheque::find($id);

        return view('fund-manager.cheques.edit')
        ->with('employee_names', $employee_names)
        ->with('cheque', $cheque);
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
        $this->validate($request, [
            'cheque_number' => 'required',
            'amount' => 'required',
            'transaction_date' => 'required',
            'employee_id' => 'required' 
        ]);

        $cheque = Cheque::find($id);
        $cheque->datetime = $request->input('transaction_date');
        $cheque->amount = $request->input('amount');
        $cheque->cheque_number = $request->input('cheque_number');
        $cheque->employee_name_id = $request->input('employee_id');
        $cheque->user_id = Auth()->user()->id;
        $cheque->save();


        $log = new Log;
        $log->user_id = Auth()->user()->user_type;
        $log->log_type = 2;
        $log->affected_table = "Cheque";
        $log->description = "Edit cheque information";
        $log->save();

        return redirect('/fund_manager/cheques')->with('success', 'Cheque Information Updated Successfully!');
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
