<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');  

        $users = User::with('roles')
                    ->where('name', 'LIKE', "%{$name}%")
                    ->orderBy('name', 'ASC')
                    ->Paginate(100);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('title', 'id');

        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $password = random_int(100000, 999999); 
        $passwordEncrypted = Hash::make($password);

        $data = $request->validated();
        $data['name'] = $request['first_name'].' '.$request['last_name'];
        $data['password'] = $passwordEncrypted;

        $user = User::create($data);
        $user->roles()->sync($request->role);

        return back()->with('message', 'Account Added Successfully, default password is '.$password);
    }

    public function show(User $user)
    {
        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('users.edit', compact('user', 'roles'));
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $data['name'] = $request['first_name'].' '.$request['last_name'];

        $result = $user->update($data);
        $user->roles()->sync($request->role);

        //return redirect()->route('users.index');
        return back()->with('message', 'Account Updated Successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }





    
}
