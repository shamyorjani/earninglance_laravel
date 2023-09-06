<?php

namespace App\Http\Controllers;

use App\Models\UserPayments;
use Illuminate\Http\Request;
use App\Models\UserHasPlan;
use App\Models\User;
use App\Models\WithdrawalRequest;
use Illuminate\Support\Facades\Auth;

class UserPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        $payments = UserPayments::all();

        $withdrawal_request_desc_order = WithdrawalRequest::where('username', $user->username)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();
        $withdrawal_request_all = WithdrawalRequest::where('status', 0)->get();
        $total_withdraw_requests = WithdrawalRequest::count();
        $total_withdraw_requests_zero = WithdrawalRequest::where('status', 0)->count();

        if ($user->role == 2) {
            $data = compact('payments', 'user', 'total_withdraw_requests_zero', 'total_withdraw_requests', 'withdrawal_request_all', 'withdrawal_request_desc_order');
            return view('user.user_payments')->with($data);
        } else {
            return redirect('/dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function status_update(Request $request, int $id)
    {
        $payments = UserPayments::find($id);
        switch ($request->input('status_update')) {
            case '1':
                $payments['status'] = '1';
                $user_has_plan = new UserHasPlan();
                $user_has_plan['username'] = $payments->username;
                $user_has_plan['plan_id'] = $payments->plan_id;
                $user_has_plan->save();
                break;

            case '2':
                $payments['status'] = '2';
                break;
        }
        $payments->save();
        return redirect('/user_payments');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserPayments $userPayments)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPayments $userPayments)
    {
        //
    }
}
