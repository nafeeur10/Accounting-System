<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Invoice;
use App\User;
use Gate;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalUser = User::count();

        if(Gate::allows('users_manage'))
        {
            $totalInvoice = Invoice::count();
        }
        else
        {
            $id = Auth::id();

            $totalInvoice = Invoice::where('customerID', $id)
                ->distinct('invoiceNumber')
                ->count();
        }
            
        return view('home', compact('totalUser', 'totalInvoice'));
    }
}
