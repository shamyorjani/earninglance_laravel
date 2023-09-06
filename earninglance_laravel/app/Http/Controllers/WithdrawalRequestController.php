<?php

namespace App\Http\Controllers;

use App\Models\WithdrawalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class WithdrawalRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($request->amount > $user->balance) {
            Session::flash('withdraw_failed', 'Not Enough Balance!');
        } else {
            $withdrawal_request = new WithdrawalRequest();
            $withdrawal_request['username'] = $user->username;
            $withdrawal_request['amount'] = $request->amount;
            $withdrawal_request['fullname'] = $request->account_name;
            $withdrawal_request['number'] = $request->account_number;
            $withdrawal_request['method_id'] = $request->method_id;
            $withdrawal_request['status'] = 0;
            $withdrawal_request->save();

            User::where('username', $user->username)->update([
                'balance' => $user->balance - $request->amount,
            ]);

            Session::flash('withdraw_success', 'Withdraw has been Successful!');
        }
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $requests = WithdrawalRequest::all();
        $user = Auth::user();

        $withdrawal_request_desc_order = WithdrawalRequest::where('username', $user->username)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();
        $withdrawal_request_all = WithdrawalRequest::where('status', 0)->get();
        $total_withdraw_requests = WithdrawalRequest::count();
        $total_withdraw_requests_zero = WithdrawalRequest::where('status', 0)->count();

        if ($user->role == 2) {
            $data = compact('requests', 'user', 'total_withdraw_requests_zero', 'total_withdraw_requests', 'withdrawal_request_all', 'withdrawal_request_desc_order');
            return view('/user/withdrawal_request')->with($data);
        } else {
            return redirect('/dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WithdrawalRequest $withdrawalRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function status_update(Request $request, int $id)
    {
        $requests = WithdrawalRequest::find($id);
        switch ($request->input('status_update')) {
            case '1':
                $requests['status'] = '1';
                break;

            case '2':
                $requests['status'] = '2';
                break;
        }
        $requests->save();
        return redirect('/withdrawal_request');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WithdrawalRequest $withdrawalRequest)
    {
        //
    }
}
