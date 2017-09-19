<?php

namespace App\Http\Controllers;

use App\Account;
use App\Operation;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $accounts = Account::all();
        $operations = Operation::all();

        return view('accounts.index', compact('accounts', 'operations'));
    }

    public function add(Request $request)
    {
        $data = $request->except('_token');
        $data['isActive'] = ($data['isActive']=='on' ? true : false);
        Account::create($data);
        $message = 'Account <strong>"'.$data['name'].'"</strong> was added';
        return redirect('/add-account')->with(['message'=>$message,'status'=>'success']);
    }
}
