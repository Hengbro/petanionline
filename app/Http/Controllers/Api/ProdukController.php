<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
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
            'namaproduk'      => 'required',
            'hargaproduk'     => 'required',
            'stockproduk'     => 'required',
            'kategoriproduk'  => 'required',
            'deskripsiproduk' => 'required'
        ]);
        if($validasi->fails()){
            return $this->error($validasi->errors()->first());
        }
        $produk = Produk::create($request->all());
        if($produk){
            return $this->success($produk, 'Produk toko berhasil di tambahkan');
        }
        return $this->error('Produk toko gagal di tambahkan');
    }
    public function show($id)
    {
        $produk = Produk::where('tokoId', $id)->where('isActive', true)->get();
        return $this->success($produk); 
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::where('id', $id)->first();
        if($produk){
            $produk->update($request->all());
            return $this->success($produk, "Produk berhasil di ubah");
        }else{
            return $this->error("Produk tidak di temukan");
        }
    }

    public function upload(Request $request){
        $fileName ="";
        if($request->gambarproduk){
            $gambarproduk = $request->gambarproduk->getClientOriginalName();  
            $gambarproduk = str_replace(' ', '', $gambarproduk);
            $gambarproduk = date('Hs') . rand(1,999) . "_" . $gambarproduk;
            $fileName = $gambarproduk;
            $request->gambarproduk->storeAs('public/produk', $gambarproduk); 
            
            return $this->success($fileName);
            }else{
                return $this->error("Gambar produk wajib di kirim");
            }
            return $this->error("Produk tidak di temukan");
    }

    public function destroy($id)
    {
        $produk = Produk::where('id', $id)->first();
        if($produk){
            $produk->update([
                'isActive' => false
            ]);
            return $this->success($produk, "Produk berhasil di hapus");
        }
        return $this->error("Produk tidak di temukan");
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
