<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    /**
     * check for email address
     *
     * @param $request
     * @return json
     */
    public function checkMobile(Request $request)
    {
        $input = $request->only(['mobile_number']);

        $request_data = [
            'mobile_number' => 'required|unique:users,mobile_number',
        ];

        $validator = Validator::make($input, $request_data);

        // json is null
        if ($validator->fails()) {
            $errors = json_decode(json_encode($validator->errors()), 1);
            return response()->json([
                'success' => false,
                'message' => array_reduce($errors, 'array_merge', array()),
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'The mobile number is available'
            ]);
        }
    }
}