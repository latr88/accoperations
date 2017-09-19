<?php

namespace App\Http\Controllers;

use App\Operation;
use Illuminate\Http\Request;

class OperationsController extends Controller
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
        Operation::create($data);
        $message = 'Operation <strong>"'.$data['name'].'"</strong> was added';
        return redirect('/add-operation')->with(['message'=>$message,'status'=>'success']);
    }
}
