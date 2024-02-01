<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSosmedRequest;
use App\Http\Requests\UpdateSosmedRequest;
use App\Models\Carousel;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreSosmedRequest $request)
    {
        $data = $request->all();
        $icon = $request->file('icon');
        $data['icon'] = Str::random(20) . '.' . $icon->getClientOriginalExtension();
        Storage::disk('public')->put($data['icon'], file_get_contents($icon));
        Sosmed::create($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan sosial media baru.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sosmed $sosmed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sosmed $sosmed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSosmedRequest $request, $id)
    {
        $data = $request->all();
        $sosmed = Sosmed::findOrFail($id);
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $data['icon'] = Str::random(20) . '.' . $icon->getClientOriginalExtension();
            Storage::disk('public')->put($data['icon'], file_get_contents($icon));
            Storage::disk('public')->delete($sosmed->icon);
        } else {
            $data['icon'] = $sosmed->icon;
        }
        $sosmed->update($data);
        return redirect()->back()->with('success', 'Berhasil mengubah sosial media');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sosmed = Sosmed::findOrFail($id);
        Storage::disk('public')->delete($sosmed->icon);
        $sosmed->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus sosial media');
    }
}
