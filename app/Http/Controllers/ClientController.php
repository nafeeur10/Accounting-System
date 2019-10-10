<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use App\Client;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Auth::user()->assignRole('admin');
        $client = User::all();
        return view('client.client', ['client'=> $client]);
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $client = new User();

        if($request->role==1)
        {
            $request->validate([
                'email' => 'required|unique:users',
                'password' => 'required'
            ]);


            $client->role = 'admin';

            if($client->companyName=='')
                $client->companyName = 'Admin';
            else
                $client->companyName = $request->companyName;

            $client->companyLogo = '';
            $client->email = $request->email;
            $client->phone = '';
            $client->zipCode = '';
            $client->city = '';
            $client->kvkNumber = '';
            $client->vatNumber = '';
            $client->bankNumber = '';
            $client->invoiceFootnote = '';
            $client->password = bcrypt($request->password);
            $client->passwordForAdmin = $request->password;
            $client->address = '';

            $client->save();
        }
        else
        {

            $request->validate([
                'companyName' => 'required',
                'email' => 'required|unique:users',
                'phone' => 'required',
                'zipCode' => 'required',
                'city' => 'required',
                'kvkNumber' => 'required',
                'vatNumber' => 'required',
                'bankNumber' => 'required',
                'invoiceFootnote' => 'required',
                'password' => 'required',
                'address' => 'required',
            ]);
            if($files=$request->file('companyLogo'))
            {
                $client->companyLogo = 'Logo';
            }

            $client->role = 'client';
            $client->companyName = $request->companyName;
            $client->email = $request->email;
            $client->phone = $request->phone;
            $client->zipCode = $request->zipCode;
            $client->city = $request->city;
            $client->kvkNumber = $request->kvkNumber;
            $client->vatNumber = $request->vatNumber;
            $client->bankNumber = $request->bankNumber;
            $client->invoiceFootnote = $request->invoiceFootnote;
            $client->password = bcrypt($request->password);
            $client->passwordForAdmin = $request->password;
            $client->address = $request->address;

            //dd($client);
            $client->save();


            $lastId = $client->id;
            $companyLogo = $request->file('companyLogo');

            $name=$lastId.$companyLogo->getClientOriginalName();
            $uploadPath = 'public/images/';
            $companyLogo->move($uploadPath, $name);

            $imageURL = $uploadPath.$name;

            $updateImage = User::find($lastId);
            $updateImage->companyLogo = $imageURL;

            $updateImage->save();
        }

        return redirect()->back()->with('message', 'Successfull! Registration is complete!');
    }
}
