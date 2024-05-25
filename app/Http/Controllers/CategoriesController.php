<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormDataCategoriesRequest;
use App\Http\Requests\FormUpdateCategories;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        if ($categories->count() > 0) {
            return response()->json([
                'status' => 'success',
                'categories' => $categories
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Kategori tidak ditemukan'
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
    public function store(FormDataCategoriesRequest $request)
    {
        $categories = Categories::create([
            'ct_name' => $request->categoryName,
        ]);

        if ($categories) {
            return response()->json([
                'status' => 'success',
                'message' => 'Kategori berhasil ditambahkan'
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Kategori gagal ditambahkan'
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
        $categories = Categories::find($id);
        if ($categories) {
            return response()->json([
                'status' => 'success',
                'products' => $categories
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
    public function update(FormUpdateCategories $request, int $ct_id)
    {
        $categories = Categories::find($ct_id);

        if ($categories) {
            $categories->update([
                'ct_name' => $request->ct_name,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Kategori berhasil diubah'
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Kategori gagal diperbarui'
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $categories = Categories::find($id);
        if ($categories) {
            $categories->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Kategori berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Kategori tidak ditemukan'
            ], 404);
        }
    }
}
