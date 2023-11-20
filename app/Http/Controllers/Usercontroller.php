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
            // 'email'=>$response->login_email,
            'email'=>$request->login_email,
            'password' =>$request->login_password
        ];

        $token = JWTAUTH::attempt($user_login);
        $user = Auth::user();

        if($token){

            return response()->Json([
                'success' => true,
                'message' => 'ສຳເລັດແລ້ວ!',
                'user' => $user,
                'token' => $token
            ]);

        } else{
            return response()->Json([
                'success' => false,
                'message' => 'ລະຫັດຜ່ານຂອງທ່ານຫຼືອີເມວບໍ່ຖືກຕ້ອງ',
                
            ]);
        }
    }
    public function logout(){


       // Auth::logout();
       // return response()->json([
       //     'success' => true,
       //     'message' => 'ອອກຈາກລະບົບສຳເລັດແລ້ວ!',
       // ]);


        // JWTAuth::getToken()

         $token = JWTAuth::getToken();
         $invalidate = JWTAuth::invalidate($token);
         if($invalidate){
             return response()->json([
                 'success' => true,
                 'message' => 'ສຳເລັດ!',
             ]);
         }

    } 

}
