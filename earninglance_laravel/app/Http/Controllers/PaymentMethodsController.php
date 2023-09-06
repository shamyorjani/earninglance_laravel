<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethods;
use App\Models\WithdrawalMethods;
use Illuminate\Http\Request;
use App\Models\WithdrawalRequest;
use Illuminate\Support\Facades\Auth;

class PaymentMethodsController extends Controller
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
        $pmethods = PaymentMethods::all();
        $wmethods = WithdrawalMethods::all();

        $withdrawal_request_desc_order = WithdrawalRequest::where('username', $user->username)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();
        $withdrawal_request_all = WithdrawalRequest::where('status', 0)->get();
        $total_withdraw_requests = WithdrawalRequest::count();
        $total_withdraw_requests_zero = WithdrawalRequest::where('status', 0)->count();

        $user = Auth::user();
        if ($user->role == 2) {
            $data = compact('pmethods', 'wmethods', 'user', 'total_withdraw_requests', 'withdrawal_request_desc_order', 'total_withdraw_requests_zero', 'withdrawal_request_all');
            return view('user/payment_methods')->with($data);
        } else {
            return redirect('/dashboard');
        }
    }

    public function add_payment_method(Request $request)
    {
        $pmethod = new PaymentMethods();
        $pmethod['name'] = $request->name;
        $pmethod['account_name'] = $request->account_name;
        $pmethod['account_number'] = $request->account_number;
        $pmethod->save();
        return redirect('/payment_methods');
    }

    public function delete_payment_method(int $id)
    {
        $pmethod = PaymentMethods::find($id);
        $pmethod->delete();
        return redirect('/payment_methods');
    }

    public function add_withdrawal_method(Request $request)
    {
        $wmethod = new WithdrawalMethods();
        $wmethod['name'] = $request->name;
        $wmethod->save();
        return redirect('/payment_methods');
    }

    public function delete_withdrawal_method(int $id)
    {
        $wmethod = WithdrawalMethods::find($id);
        $wmethod->delete();
        return redirect('/payment_methods');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethods $paymentMethods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentMethods $paymentMethods)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethods $paymentMethods)
    {
        //
    }
}
