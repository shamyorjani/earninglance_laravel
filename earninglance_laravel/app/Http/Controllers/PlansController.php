<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plans;
use App\Models\WithdrawalRequest;
use Illuminate\Support\Facades\Auth;

class PlansController extends Controller
{
    public function select()
    {
        $plans = Plans::all();
        $data = compact('plans');
        return view('index')->with($data);
    }

    public function show()
    {
        $plans = Plans::all();
        $user = Auth::user();

        $withdrawal_request_desc_order = WithdrawalRequest::where('username', $user->username)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();
        $withdrawal_request_all = WithdrawalRequest::where('status', 0)->get();
        $total_withdraw_requests = WithdrawalRequest::count();
        $total_withdraw_requests_zero = WithdrawalRequest::where('status', 0)->count();

        if ($user->role == 2) {
            $data = compact('plans', 'user', 'total_withdraw_requests_zero', 'total_withdraw_requests', 'withdrawal_request_all', 'withdrawal_request_desc_order');
            return view('user/plans')->with($data);
        } else {
            return redirect('/dashboard');
        }
    }

    public function store(Request $request)
    {
        $plans = new Plans();
        $plans['name'] = $request->name;
        $plans['level'] = $request->level;
        $plans['charges'] = $request->charges;
        $plans['bonus'] = $request->bonus;
        $plans['direct'] = $request->direct;
        $plans['indirect'] = $request->indirect;
        $plans['features'] = $request->features;
        $plans->save();
        return redirect('/plans');
    }

    public function delete(int $id)
    {
        $plans = Plans::find($id);
        $plans->delete();
        return redirect('/plans');
    }
}
