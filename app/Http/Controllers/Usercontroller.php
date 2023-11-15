<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class Usercontroller extends Controller
{
    //
    public function register(Request $request){
        try {
            //code...ບັນທຶກຂໍ້ມູນຢູເຊີໃຫ່ມ
            $user = new user([
                "name" => $request->from_user_name,
                "email" => $request->from_email,
                "password" => Hash::Make($request->from_password),
                
            ]);

            $user->save();

            $success = true;
            $message = 'ບັນທຶກຂໍ້ມູນສຳເລັດ!';

        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            "success" => $success,
            "message" => $message
        ];
        return response()->Json($response);
    }

    public function login(Request $request){
        $user_login = [
            'email' =>$response->login_email,
            'password' =>$response->login_password
        ];

        $token = JWTAUTH::attempt($user_login);
        $user = Auth::user();

        if($token){

            return response()->Json([
                'success' => true,
                'message' => 'ສຳເລັດແລ້ວ!',
                'user' => $user,
                'toker' => $token
            ]);

        } else{
            return response()->Json([
                'success' => true,
                'message' => 'ລະຫັດຜ່ານຂອງທ່ານຫຼືອີເມວບໍ່ຖືກຕ້ອງ',
                
            ]);
        }
    }
        

}
