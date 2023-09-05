<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Keranjang;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(),[
            'userId' => 'required|unique:keranjangs',
            'produkId' => 'required|unique:keranjangs',
            'tokoId' => 'required|unique:keranjangs',
            'jumlah' => 'required'
        ]);
        if($validasi->fails()){
            return $this->error($validasi->errors()->first());
        }
        $keranjang = Keranjang::create($request->all());
        if($keranjang){
            return $this->success($keranjang, 'Produk berhasil di tambahkan');
        }
        return $this->error('Produk gagal di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $keranjang = Keranjang::where('id', $id)->first();
        if($keranjang){
            $keranjang->update($request->all());
            return $this->success($keranjang);
        }else{
            return $this->error("Produk tidak di temukan");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keranjang = Keranjang::where('id', $id)->first();
        if($keranjang){
            $keranjang->update([
                'isActive' => false
            ]);
            return $this->success($keranjang, "Produk berhasil di hapus");
        }else{
            return $this->error("Produk tidak di temukan");
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
