<?php

namespace App\Http\Controllers;

use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UpdateClientRequest;
use DB;

class ClientController extends Controller
{

    public function __construct()
    {
        if(!($this->middleware(['auth', 'role:client'])))
        {
            return abort(401);
        }
    }

    public function userProfile()
    {
        $user = Auth::user();
        $roles = Role::get()->pluck('name', 'name');
        // dd($user);
        return view('client.userProfile', compact('user', 'roles'));
    }

    public function editUserProfile($id)
    {
        $role = DB::table('roles')
            ->join('model_has_roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('model_has_roles.model_id' ,'=', $id)
            ->select('roles.name')
            ->get();
                    
        //dd($users);

        $roles = Role::get()->pluck('name', 'name');
        $user = User::find($id);

        return view('client.edit', compact('user', 'roles', 'role'));
    }

    public function update(UpdateClientRequest $request, User $user)
    {
        //$user = new User();

        //$user->$request->all();
        $user->update($request->all());

        // $user1 = $request->password;
        // $user->passwordForAdmin = $user1;
        //$user->save();

        if($files=$request->file('companyLogo'))
        {
            $user->companyLogo = 'Logo';
            $lastId = $user->id;
            $companyLogo = $request->file('companyLogo');

            $name=$lastId.$companyLogo->getClientOriginalName();
            $uploadPath = 'images/';
            $companyLogo->move($uploadPath, $name);

            $imageURL = $uploadPath.$name;

            $updateImage = User::find($lastId);
            $updateImage->companyLogo = $imageURL;

            $updateImage->save();
        }

        // $roles = $request->input('roles') ? $request->input('roles') : [];
        // $user->syncRoles($roles);

        return redirect()->route('user-info');
    }
}
