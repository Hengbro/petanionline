<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $user['listproduk'] = Produk::all(); 
        return view('produk')->with($user);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //dd($request->all());die();
        $filename = '';
        if($request->file('gambarproduk')->getClientOriginalName()){
            $file = str_replace(' ', '', $request->file('gambarproduk')->getClientOriginalName());
            $filename = date('YmdHs').rand(1,999).'_'.$file;
            $request->gambarproduk->storeAs('public/produk', $filename);
        }
        $user = Produk::create(array_merge($request->all(),[
            'gambarproduk' => $filename 
        ]));
        return redirect('produk');
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
}
