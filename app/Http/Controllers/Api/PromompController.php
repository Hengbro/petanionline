<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promomp;

class PromompController extends Controller
{
    public function promomp(Request $request){
        //dd($request->all());die();
        $promomp = Promomp::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get promo berhasil ',
            'promomps' =>$promomp
        ]);
    }
}
