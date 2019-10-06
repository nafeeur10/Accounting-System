<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use App\Client;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::all();
        return view('home', ['client'=> $client]);
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $client = new Client();

        $client->name = $request->name;
        $client->email = $request->email;
        $client->address = $request->address;

        //dd($client);
        $client->save();
        return redirect(('/home'));
    }
}
