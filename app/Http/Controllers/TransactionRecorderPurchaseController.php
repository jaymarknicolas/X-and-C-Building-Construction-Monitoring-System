<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Cheque;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;

class TransactionRecorderPurchaseController extends Controller
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
        $purchases = Purchase::select('*')
        ->where('user_id', Auth()->user()->id)
        ->get();

        $log = new Log;
        $log->user_id = Auth()->user()->user_type;
        $log->log_type = 0;
        $log->affected_table = "Purchase";
        $log->description = "User access purchases list's";
        $log->save();

        return view('transaction-recorder.purchases.index')->with('purchases', $purchases);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cheques = Cheque::all();
        $projects = Project::select('*')->where('status', 1)->get();

        // $purchases = Purchase::all();
        // return $purchases;

        
        return view('transaction-recorder.purchases.create')
        ->with('cheques', $cheques)
        ->with('projects', $projects);
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
            'or_number' => 'required|unique:purchases',
            'transaction_date' => 'required',
            'amount' => 'required', 
            'cheque_number' => 'required',
            'project_id' => 'required',
            'description' => 'required'
        ]); 


        $cheques = Cheque::select('*')->where('cheque_number', $request->cheque_number)->get();

        // return $cheques;

        if(count($cheques) <= 0) {
            return redirect()->back()->with('error', 'Cheque Number not exists!');
        }


        $purchases = Purchase::select('*')->where('cheque_id', $cheques[0]->id)->get();


        $totalPurchase = 0;

        foreach($purchases as $purchase) {
            $totalPurchase += $purchase->amount;
        }



        if($totalPurchase >= $cheques[0]->amount) {
            
            if( ($totalPurchase + $request->amount) >= $cheques[0]->amount) {
                return redirect()->back()->with('error', 'Cheque Number is not available!');
            }
        }

        


        $purchase = new Purchase;
        $purchase->OR_Number = $request->input('or_number');
        $purchase->transaction_date = date("Y-m-d", strtotime($request->input('transaction_date')));
        $purchase->cheque_id = $cheques[0]->id;
        $purchase->project_id = $request->input('project_id');
        $purchase->amount = $request->input('amount');
        $purchase->description = $request->input('description');
        $purchase->user_id = Auth()->user()->id;
        $purchase->save();

        $log = new Log;
        $log->user_id = Auth()->user()->user_type;
        $log->log_type = 1;
        $log->affected_table = "Purchase";
        $log->description = "User add new purchase";
        $log->save();


        return redirect('/transaction_recorder/purchases')->with('success', 'Purchase Inserted Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = Purchase::find($id);
        return view('purchases.show')
        ->with('purchase', $purchase);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase = Purchase::find($id);
        $cheques = Cheque::all();
        $projects = Project::select('*')->where('status', 1)->get();
        return view('transaction-recorder.purchases.edit')
        ->with('cheques', $cheques)
        ->with('projects', $projects)
        ->with('purchase', $purchase);
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
            'or_number' => 'required',
            'transaction_date' => 'required',
            'amount' => 'required', 
            'cheque_number' => 'required',
            'project_id' => 'required',
            'description' => 'required'
        ]); 


        $cheques = Cheque::select('*')->where('cheque_number', $request->cheque_number)->get();

        // return $cheques;

        if(count($cheques) <= 0) {
            return redirect()->back()->with('error', 'Cheque Number not exists!');
        }


        $purchases = Purchase::select('*')->where('cheque_id', $cheques[0]->id)->get();


        $totalPurchase = 0;

        foreach($purchases as $purchase) {
            $totalPurchase += $purchase->amount;
        }



        if($totalPurchase >= $cheques[0]->amount) {
            
            if( ($totalPurchase + $request->amount) >= $cheques[0]->amount) {
                return redirect()->back()->with('error', 'Cheque Number is not available!');
            }
        }

        


        $purchase = Purchase::find($id);
        $purchase->OR_Number = $request->input('or_number');
        $purchase->transaction_date = date("Y-m-d", strtotime($request->input('transaction_date')));
        $purchase->cheque_id = $cheques[0]->id;
        $purchase->project_id = $request->input('project_id');
        $purchase->amount = $request->input('amount');
        $purchase->description = $request->input('description');
        $purchase->user_id = Auth()->user()->id;
        $purchase->save();

        $log = new Log;
        $log->user_id = Auth()->user()->user_type;
        $log->log_type = 2;
        $log->affected_table = "Purchase";
        $log->description = "Edit purchase information";
        $log->save();


        return redirect('/transaction_recorder/purchases')->with('success', 'Purchase Updated Successfully!');
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
