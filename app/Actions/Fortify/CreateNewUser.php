<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'client_name' => ['required', 'string', 'max:100'],
            'client_address' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:11'],
            'account_type' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $message = "You have successfully registered! Do wait for 3-5 working days for the approval of your account. You may then proceed with your application. Thank you!";	






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
        CURLOPT_POSTFIELDS => array('message' => $message,'number' => $input['mobile_number']),
        CURLOPT_HTTPHEADER => array(
            "X-TXTBOX-Auth: fc3beeecba27a78cb93cee5887257ac4"
        ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);    











        return User::create([
            'name' => $input['name'],
            'client_name' => $input['client_name'],
            'client_address' => $input['client_address'],
            'position' => $input['position'],
            'mobile_number' => $input['mobile_number'],
            'account_type' => $input['account_type'],
            'user_type' => '5',
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);



        
    }
}
