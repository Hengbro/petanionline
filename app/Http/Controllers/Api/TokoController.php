<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TokoController extends Controller
{
    public function upload(Request $request)
    {
        $validasi = Validator::make($request->all(),[
            'userId' => 'required|unique:tokos',
            'name' => 'required|unique:tokos',
            'email' => 'required|unique:tokos',
            'kota' => 'required'
        ]);
        if($validasi->fails()){
            return $this->error($validasi->errors()->first());
        }
        $toko = Toko::create($request->all());
        return $this->success($toko);
    }
    public function cekToko($id){
        $user = User::where('id', $id)->with(['toko', 'userRole'])->first();
        if($user){
            return $this->success($user);
        }else{
            return $this->error('toko tidak ditemukan');
        }
    }
    public function success($user, $message = "success"){
        return response()->json([
            'success' => 1,
            'message' => $message,
            'user' =>$user
        ]);
    }
    public function error($pesan){
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }
}
