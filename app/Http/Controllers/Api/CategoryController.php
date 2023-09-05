<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $alamat = Category::where('isActive', true)->get();
        return $this->success($alamat);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(),[
            'name'     => 'required',
            'image'     => 'required',
        ]);
        if($validasi->fails()){
            return $this->error($validasi->errors()->first());
        }
        $alamat = Category::create($request->all());
        if($alamat){
            return $this->success($alamat, 'Kategori toko berhasil di tambahkan');
        }
        return $this->error('Kategori toko gagal di tambahkan');
    }

    public function show($id)
    {
        $alamat = Category::where('tokoId', $id)->where('isActive', true)->get();
        return $this->success($alamat);   
    }
    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $alamat = Category::where('id', $id)->first();
        if($alamat){
            $alamat->update($request->all());
            return $this->success($alamat);
        }else{
            return $this->error("Kategori tidak di temukan");
        }
    }

    public function destroy($id)
    {
        $alamat = Category::where('id', $id)->first();
        if($alamat){
            $alamat->update([
                'isActive' => false
            ]);
            return $this->success($alamat, "Kategori berhasil di hapus");
        }else{
            return $this->error("Kategori tidak di temukan");
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
