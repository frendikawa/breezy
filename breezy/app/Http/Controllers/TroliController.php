<?php

namespace App\Http\Controllers;

use App\Models\Troli;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TroliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trolis = Troli::latest()->get();
        return view('troli', compact('trolis'));
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
        Troli::create($request->all());

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
        $troli->delete();
        return to_route('troli.index')->with('success', 'Berhasil menghapus dari troli anda.');
    }
}
