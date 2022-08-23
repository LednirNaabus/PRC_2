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
use DB;
Use Carbon\Carbon;

use Laravel\Fortify\Fortify;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $account_type = $request->input('account_type');  
        $name = $request->input('name');  
        $user_type = $request->input('user_type');  

        //dd($account_type);

        $users = User::with('roles')
                    ->where('account_type', 'LIKE', "%".$account_type."%")
                    ->where('name', 'LIKE', "%".$name."%")
                    ->where('user_type', 'LIKE', "%".$user_type."%")
                    ->where('registration_status', '1')
                    ->where('id','<>','1')
                    ->orderBy('name', 'ASC')
                    ->Paginate(5);

        return view('users.index', compact('users'));
    }

    public function registration(Request $request)
    {
        $date_registered_start = \Carbon\Carbon::parse($request->input('date_registered_start'));        
        $date_registered_start->format('Y-m-d');

        $date_registered_end = \Carbon\Carbon::parse($request->input('date_registered_end'));        
        $date_registered_end->format('Y-m-d');

        $account_type = $request->input('account_type');  
        $name = $request->input('name');  


        if ($request->input('date_registered_start')=="") {
            $users = User::where('name', 'LIKE', "%{$name}%")
                        ->where('account_type', 'LIKE', "%{$account_type}%")
                        ->where('registration_status', '<>', '')
                        ->where('registration_status', '0')
                        ->orderBy('name', 'ASC')
                        ->Paginate(5);

        } else {
            $users = User::where('name', 'LIKE', "%{$name}%")
                        ->where('account_type', 'LIKE', "%{$account_type}%")
                        ->where('registration_status', '<>', '')
                        ->where('registration_status', '0')
                        ->whereBetween('created_at', [$date_registered_start, $date_registered_end])
                        ->orderBy('name', 'ASC')
                        ->Paginate(5);
        }

        return view('users.registration', compact('users'));
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
        $data['employee_number'] = strtoupper(uniqid("EMP"));
        
        
        $data['password'] = $passwordEncrypted;

        $user = User::create($data);
        $user->roles()->sync($request->role);


        $message = "Your default password is ".$password.". Kindly change password after login!";

        $curl = curl_init();
                    
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://ws-live.txtbox.com/v1/sms/push",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array('message' => $message,'number' => $request['mobile_number']),
        CURLOPT_HTTPHEADER => array(
            "X-TXTBOX-Auth: fc3beeecba27a78cb93cee5887257ac4"
        ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);    






        return back()->with('message', 'Account Added Successfully, default password is '.$password);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function editApprove($id)
    {
        $user = User::find($id);
        
        return view('users.edit-approve', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $result = $user->update($request->validated());
        //$user->roles()->sync($request->user_type);

        //return redirect()->route('users.index');
        return back()->with('message', 'Account Updated Successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }

    public function updateApprove($id)
    {
        DB::table('users')->where('id', $id)->update(array('registration_status' => '1'));


        $user = User::find($id);


        $mobile_number = $user->mobile_number;

        $message = "We are pleased to inform you that your registration for an account at PRC's Accreditation System has been approved. You may start your application now. Thank you!";	






        $curl = curl_init();
                    
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://ws-live.txtbox.com/v1/sms/push",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array('message' => $message,'number' => $mobile_number),
        CURLOPT_HTTPHEADER => array(
            "X-TXTBOX-Auth: fc3beeecba27a78cb93cee5887257ac4"
        ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);    



        return back()->with('message', 'Approved Successfully');
    }



     
}
