<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        if ($users->count() > 0) {
            return response()->json([
                'status' => 'success',
                'users' => $users
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'User tidak ditemukan'
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
    public function store(Request $request)
    {
        //
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
        $users = User::find($id);
        if ($users) {
            return response()->json([
                'status' => 'success',
                'users' => $users
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'User tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormUpdateUser $request, int $us_id)
    {
        $users = User::find($us_id);

        if ($users) {
            $users->update([
                'us_name' => $request->us_name,
                'us_email' => $request->us_email,
                'us_phone_number' => $request->us_phone_number,
                'us_address' => $request->us_address
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data user berhasil diperbarui',
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Data user gagal diperbarui'
            ], 404);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $users = User::find($id);
        if ($users) {
            $users->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data user berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'User tidak ditemukan'
            ], 404);
        }
    }
}
