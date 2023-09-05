<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Produk;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProdukHomeController extends Controller
{
    public function index()
    {
        $produk = Produk::where('isActive', true)->get();
        return $this->success($produk); 
    }

    public function newproduct()
    {
        //$end = Carbon::parse($request->strtime("-30 days"));
        $produk = Produk::where('created_at', '>=', Carbon::now()->subMonth(1))//[$start, $end]
        ->where('isActive', true)->get();
        //$produk = Produk::whereBetween('created_at',[1, 30])->where('isActive', true)->get();
        return $this->success($produk); 
    }
    public function cari($cari)
    {
        //$cari = $request->input('namaproduk');
        $produk = Produk::orwhere('namaproduk','LIKE', '%'.$cari.'%')
                        ->orwhere('kategoriproduk','LIKE', '%'.$cari.'%')
                        ->orwhere('id','LIKE', '%'.$cari.'%')
                        ->orwhere('deskripsiproduk','LIKE', '%'.$cari.'%')
                        ->orwhere('stockproduk','LIKE', '%'.$cari.'%')
                        ->where('isActive', true)->get();
        if(count($produk)){
            return $this->success($produk);
        }else{
            return $this->error('Data tidak di temukan');
        }
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
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
