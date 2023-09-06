<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WithdrawalRequest;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $users = User::all();
        $user = Auth::user();

        $withdrawal_request_desc_order = WithdrawalRequest::where('username', $user->username)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();
        $withdrawal_request_all = WithdrawalRequest::where('status', 0)->get();
        $total_withdraw_requests = WithdrawalRequest::count();
        $total_withdraw_requests_zero = WithdrawalRequest::where('status', 0)->count();

        if ($user->role == 2) {
            $data = compact('users', 'user', 'total_withdraw_requests_zero', 'total_withdraw_requests', 'withdrawal_request_all', 'withdrawal_request_desc_order');
            return view('user/users')->with($data);
        } else {
            return redirect('/dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function addBalance(Request $request, int $id)
    {
        $user = User::find($id);
        $user['balance'] += $request->amnt;
        $user->save();
        return redirect('/users');
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
