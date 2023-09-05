<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alamattoko;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AlamattokoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(),[
            'alamat'     => 'required',
            'label'     => 'required',
            'provinsi'   => 'required',
            'kota'       => 'required',
            'kecamatan'  => 'required',
            'kodepos'    => 'required',
            'email'      => 'required',
            'phone'      => 'required'
        ]);
        if($validasi->fails()){
            return $this->error($validasi->errors()->first());
        }
        $alamat = Alamattoko::create($request->all());
        if($alamat){
            return $this->success($alamat, 'Alamat toko berhasil di tambahkan');
        }
        return $this->error('Alamat toko gagal di tambahkan');
    }

    public function show($id)
    {
        $alamat = Alamattoko::where('tokoId', $id)->where('isActive', true)->get();
        return $this->success($alamat);   
    }
    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $alamat = Alamattoko::where('id', $id)->first();
        if($alamat){
            $alamat->update($request->all());
            return $this->success($alamat);
        }else{
            return $this->error("Alamat tidak di temukan");
        }
    }

    public function destroy($id)
    {
        $alamat = Alamattoko::where('id', $id)->first();
        if($alamat){
            $alamat->update([
                'isActive' => false
            ]);
            return $this->success($alamat, "Alamat berhasil di hapus");
        }else{
            return $this->error("Alamat tidak di temukan");
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
