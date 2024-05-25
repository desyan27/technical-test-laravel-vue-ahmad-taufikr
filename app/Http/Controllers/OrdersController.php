<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormDataOrderRequest;
use App\Http\Requests\FormUpdateOrder;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::join('products', 'orders.or_pd_id', '=', 'pd_id')
            ->select('orders.*', 'pd_name')->orderBy('or_id')->get();
        if ($orders->count() > 0) {
            return response()->json([
                'status' => 'success',
                'orders' => $orders
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Data order tidak ditemukan'
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
    public function store(FormDataOrderRequest $request)
    {
        $orders = Orders::create([
            'or_pd_id' => $request->nameProduct,
            'or_amount' => $request->total,
        ]);

        if ($orders) {
            return response()->json([
                'status' => 'success',
                'message' => 'Order berhasil ditambahkan'
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Order gagal ditambahkan'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $orders = Orders::find($id);
        if ($orders) {
            return response()->json([
                'status' => 'success',
                'products' => $orders
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
    public function update(FormUpdateOrder $request, int $or_id)
    {
        $orders = Orders::find($or_id);

        if ($orders) {
            $orders->update([
                'or_pd_id' => $request->or_pd_id,
                'or_amount' => $request->or_amount,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Order berhasil diubah'
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Order gagal diperbarui'
            ], 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $orders = Orders::find($id);
        if ($orders) {
            $orders->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Order berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Order tidak ditemukan'
            ], 404);
        }
    }
}
