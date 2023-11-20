<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class Storecontroller extends Controller
{
    //

    public function index(){



    }

    public function edit($id){



    }

    public function add(Request $request){

        try {
            //code...ບັນທຶກຂໍ້ມູນຢູເຊີໃຫ່ມ
           // return $request->amount;

            $store = new Store([
                'name' => $request->name,
                'image' => '',
                'amount' => $request->amount,
                'price_buy' => $request->price_buy,
                'price_sell' => $request->price_sell,
            ]);

            $store->save();

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

    public function update($id,Request $request){



    }

    public function delete($id){



    }

}
