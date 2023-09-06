<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethods;
use App\Models\UserPayments;
use App\Models\Plans;
use App\Models\WithdrawalRequest;
use App\Models\WithdrawalMethods;
use App\Models\User;
use App\Models\UserHasPlan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        // $pmethods = PaymentMethods::all();
        // $user = Auth::user();
        // $data = compact('pmethods', 'user');
        // return view('user.index')->with($data);
    }

    /**
     * Select plans from dashboard page.
     */
    public function plans(int $id)
    {
        if (Auth::check()) {
            // return redirect('/dashboard');
            $user = Auth::user();
            $users = User::count();

            $plans = Plans::all();
            $pmethods = PaymentMethods::all();
            $wmethods = WithdrawalMethods::all();

            $withdrawal_request_desc_order = WithdrawalRequest::where('username', $user->username)
                ->orderBy('id', 'desc')
                ->limit(4)
                ->get();
            $withdrawal_request_all = WithdrawalRequest::where('status', 0)->get();
            $total_withdraw_requests = WithdrawalRequest::count();
            $total_withdraw_requests_zero = WithdrawalRequest::where('status', 0)->count();

            $user_payments_status_count = UserPayments::where('status', 0)->count();
            $user_payments_user_count = UserPayments::where('username', $user->username)->count();
            DB::statement("SET SQL_MODE=''");
            $userearning = WithdrawalRequest::select("*", DB::raw('SUM(amount) as total'))
                ->where([
                    ['username', '=', $user->username],
                    ['status', '=', 1],
                ])
                ->groupBy('method_id')
                ->get('total');

            $user_payments = UserPayments::where('username', $user->username);
            if ($user_payments != null) {
                $user_payments_plan_id = $id;
                $user_plan = Plans::find($user_payments_plan_id);
            } else {
                $user_plan = $plans;
            }
            $total_user_payments = UserPayments::where('status', 1)->sum('amount');
            $total_withdraw_amount = WithdrawalRequest::where('status', 0)->sum('amount');
            $plans_with_id = Plans::find($id);
            $user_has_plan_count = UserHasPlan::where('username', $user->username)->count();

            $data = compact('user_has_plan_count', 'pmethods', 'user', 'users', 'plans', 'total_withdraw_amount', 'plans_with_id', 'user_payments_status_count', 'total_user_payments', 'user_payments_user_count', 'user_payments', 'user_plan', 'wmethods', 'withdrawal_request_desc_order', 'total_withdraw_requests', 'total_withdraw_requests_zero', 'withdrawal_request_all', 'userearning');
            return view('user.index')->with($data);
        }
        return redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function uploads(Request $request, int $plan_id)
    {
        $id = Auth::id();
        $user = Auth::user();
        $method_id = $request->get('payment');
        $plans = Plans::find($plan_id);
        $charges = $plans->charges;

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $payment_file_name = time() . '.' . $extension;
        $file_path = $file->storeAs('public/payments', $payment_file_name);

        UserPayments::where('id', '4')->update(['image' => 'payments/' . $payment_file_name]);
        $user_payments = new UserPayments();
        $user_payments['username'] = $user->username;
        $user_payments['plan_id'] = $plan_id;
        $user_payments['method_id'] = $method_id;
        $user_payments['amount'] = $charges;
        $user_payments['image'] = $payment_file_name;
        $user_payments['status'] = 0;
        $user_payments->save();



        // $path = asset('storage/'.$path);
        // $data = compact('$path');
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        if (Auth::check()) {
            // return redirect('/dashboard');
            $user = Auth::user();
            $users = User::count();

            $plans = Plans::all();
            $pmethods = PaymentMethods::all();
            $wmethods = WithdrawalMethods::all();
            $withdrawal_request_desc_order = WithdrawalRequest::where('username', $user->username)
                ->orderBy('id', 'desc')
                ->limit(4)
                ->get();
            $withdrawal_request_all = WithdrawalRequest::all();

            $total_withdraw_requests = WithdrawalRequest::count();
            $total_withdraw_requests_zero = WithdrawalRequest::where('status', 0)->count();

            $user_payments_status_count = UserPayments::where('status', 0)->count();
            $user_payments_user_count = UserPayments::where('username', $user->username)->count();

            DB::statement("SET SQL_MODE=''");
            $userearning = WithdrawalRequest::select("*", DB::raw('SUM(amount) as total'))
                ->where([
                    ['username', '=', $user->username],
                    ['status', '=', 1],
                ])
                ->groupBy('method_id')
                ->first();
            // $userearning = $userearning['total'] ;

            $user_payments = UserPayments::where('username', $user->username)->first();
            if ($user_payments != null) {
                $user_payments_plan_id = $user_payments->plan_id;
                $user_plan = Plans::find($user_payments_plan_id);
            } else {
                $user_plan = $plans;
            }

            $total_user_payments = UserPayments::where('status', 1)->sum('amount');
            $total_withdraw_amount = WithdrawalRequest::where('status', 0)->sum('amount');

            // $wrequest_at_1 = WithdrawalRequest::where('status', 1);
            $id = null;
            $plans_with_id = Plans::find($id);
            $user_has_plan_count = UserHasPlan::where('username', $user->username)->count();

            $data = compact('user_has_plan_count', 'pmethods', 'user', 'users', 'plans', 'total_withdraw_amount', 'plans_with_id', 'user_payments_status_count', 'total_user_payments', 'user_payments_user_count', 'user_payments', 'user_plan', 'wmethods', 'withdrawal_request_desc_order', 'total_withdraw_requests', 'total_withdraw_requests_zero', 'withdrawal_request_all', 'userearning');
            return view('user.index')->with($data);
        }
        return redirect('/login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
