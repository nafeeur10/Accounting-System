<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    
    public function index()
    {
        $users = Contact::all();
        return view('invoice.index', compact('users'));
    }

   
    public function create(Contact $user)
    {
        $client = Auth::user();
        return view('invoice.create', compact('user', 'client'));
    }

    public function store(Request $request)
    {
        //
    }

   
    public function show(Invoice $invoice)
    {
        //
    }

   
    public function edit(Invoice $invoice)
    {
        //
    }

   
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

   
    public function destroy(Invoice $invoice)
    {
        //
    }
}
