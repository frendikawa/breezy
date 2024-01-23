<?php

namespace App\Http\Controllers;

use App\Models\Troli;
use Illuminate\Http\Request;

class TroliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('troli');
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
    public function store($product_id)
    {
        $user_id = auth()->user()->id; // Sesuaikan sesuai kebutuhan Anda

        // Simpan informasi ke dalam tabel troli
        Troli::create([
            'user_id'    => $user_id,
            'product_id' => $product_id,
            // tambahkan kolom lain sesuai kebutuhan
        ]);

        return redirect()->back()->with('success', 'Produk ditambahkan ke dalam troli.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Troli $troli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Troli $troli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Troli $troli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Troli $troli)
    {
        //
    }
}
