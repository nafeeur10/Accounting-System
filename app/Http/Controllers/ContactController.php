<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Contact::all();
        return view('contacts.index', compact('users'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        if (! Gate::allows('client_manage')) {
            return abort(401);
        }
        Contact::create($request->all());
        return redirect()->route('contact');
    }

    public function show(Contact $user)
    {
        if (! Gate::allows('client_manage')) {
            return abort(401);
        }

        return view('contacts.show', compact('user'));
    }

    public function edit(Contact $user)
    {
        if (!Gate::allows('client_manage')) {
            return abort(401);
        }
        return view('contacts.edit', compact('user'));
    }

    public function update(Request $request, Contact $user)
    {
        if (!Gate::allows('client_manage')) {
            return abort(401);
        }

        $user->update($request->all());
        $user->save();

        return redirect()->route('contact');
    }

    public function destroy(Contact $user)
    {
        if (! Gate::allows('client_manage')) {
            return abort(401);
        }

        $user->delete();

        return redirect()->route('contact');
    }
}
