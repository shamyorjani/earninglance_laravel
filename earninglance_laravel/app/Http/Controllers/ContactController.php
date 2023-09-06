<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\WithdrawalRequest;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
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
        $contact = new Contact();
        $contact['firstname'] = $request->firstname;
        $contact['lastname'] = $request->lastname;
        $contact['email'] = $request->email;
        $contact['msg'] = $request->msg;
        $contact->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();

        $withdrawal_request_desc_order = WithdrawalRequest::where('username', $user->username)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();
        $withdrawal_request_all = WithdrawalRequest::where('status', 0)->get();
        $total_withdraw_requests = WithdrawalRequest::count();
        $total_withdraw_requests_zero = WithdrawalRequest::where('status', 0)->count();

        if (Auth::user()->role == 2) {
            $contacts = Contact::all();
            $data = compact('contacts', 'user', 'total_withdraw_requests_zero', 'total_withdraw_requests', 'withdrawal_request_all', 'withdrawal_request_desc_order');
            return view('user/contact')->with($data);
        } else {
            return redirect('/dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
