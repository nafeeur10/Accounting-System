<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use App\Client;
use Illuminate\Support\Facades\DB;

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

        if($files=$request->file('companyLogo'))
        {
            $client->companyLogo = 'Logo';
        }

        $client->companyName = $request->companyName;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->zipCode = $request->zipCode;
        $client->city = $request->city;
        $client->kvkNumber = $request->kvkNumber;
        $client->vatNumber = $request->vatNumber;
        $client->bankNumber = $request->bankNumber;
        $client->invoiceFootnote = $request->invoiceFootnote;
        $client->password = $request->password;
        $client->address = $request->address;

        //dd($client);
        $client->save();


        $lastId = $client->id;
        $companyLogo = $request->file('companyLogo');

        $name=$lastId.$companyLogo->getClientOriginalName();
        $uploadPath = 'public/images/';
        $companyLogo->move($uploadPath, $name);

        $imageURL = $uploadPath.$name;

        $updateImage = Client::find($lastId);
        $updateImage->companyLogo = $imageURL;

        $updateImage->save();

        return redirect()->back()->with('message', 'Successfully Save Your Image file.');
    }
}
