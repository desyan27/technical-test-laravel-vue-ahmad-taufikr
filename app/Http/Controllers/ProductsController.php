<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormDataRequest;
use App\Http\Requests\FormUpdateProduct;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::join('categories', 'products.pd_ct_id', '=', 'ct_id')
            ->select('products.*', 'categories.ct_name')->orderBy('pd_id', 'asc')
            ->get();
        if ($products->count() > 0) {
            return response()->json([
                'status' => 'success',
                'products' => $products
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Tidak ada data produk'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormDataRequest $request)
    {
        $products = Products::create([
            'pd_ct_id' => $request->category,
            'pd_name' => $request->name,
            'pd_price' => $request->price,
        ]);

        if ($products) {
            return response()->json([
                'status' => 'success',
                'message' => 'Produk berhasil ditambahkan'
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Produk gagal ditambahkan'
            ], 400);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $products = Products::find($id);
        if ($products) {
            return response()->json([
                'status' => 'success',
                'products' => $products
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormUpdateProduct $request, int $pd_id)
    {
        $products = Products::find($pd_id);

        if ($products) {
            $products->update([
                'pd_ct_id' => $request->pd_ct_id,
                'pd_name' => $request->pd_name,
                'pd_price' => $request->pd_price
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Produk berhasil diubah'
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Produk gagal diperbarui'
            ], 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $products = Products::find($id);
        if ($products) {
            $products->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Produk berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }
    }
}
