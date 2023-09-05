<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Helper;
use App\Models\User;
use App\Models\PersonalToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use Helper;
    public function login(Request $request){
        //dd($request->all());die();
        $validasi = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if($validasi->fails()){
            return $this->error($validasi->errors()->first());
        }

        $user = User::where('email',$request->email)->with('userRole')->first();
        if($user){
            if(password_verify($request->password, $user->password)){
                $token = PersonalToken::create([
                    'token' => $this->generateToken(),
                    'userId' => $user->id
                ]);

                $user->token = $token->token;

                return $this->success($user);
            }else{
                return $this->error('Email atau Password salah');
            }
        }
        return $this->error('Pengguna tidak ditemukan');
    }

    public function registrasi(Request $request){
        $validasi = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:8'
        ]);

        if($validasi->fails()){
            return $this->error($validasi->errors()->first());
        }

        $user = User::create(array_merge($request->all(),[
            'password' => bcrypt($request->password)
        ]));
        if($user){
                return $this->success('Selamat datang ' . $user->name);
            }else{
                return $this->error('Registrasi gagal');
            }   
    }

    public function update(Request $request, $id){
        $user = User::where('id', $id)->first();
        if ($user){
            $user->update($request->all());
            return $this->success($user);
        }
        return $this->error("Pengguna tidak di temukan");
    }
    public function upload(Request $request, $id){
        $user = User::where('id', $id)->first();
        if ($user){
            $fileName ="";
            if($request->image){
                $image = $request->image->getClientOriginalName();
                $image = str_replace(' ', '', $image);
                $image = date('Hs') . rand(1,999) . "_" . $image;
                $fileName = $image;
                $request->image->storeAs('public/user', $image);           
            }else{
                return $this->error("Image wajib di kirim");
            }
            $user->update([
                'image' => $fileName
            ]);
            return $this->success($user);
        }
        return $this->error("Pengguna tidak di temukan");
    }

    public function success($user, $message = "success"){
        return response()->json([
            'success' => 200,
            'message' => $message,
            'user' =>$user
        ]);
    }

    public function error($pesan){
        return response()->json([
            'success' => 400,
            'message' => $pesan
        ]);
    }
}
