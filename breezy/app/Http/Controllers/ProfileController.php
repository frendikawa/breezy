<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        // Meneruskan data pengguna ke tampilan 'profile'
        return view('profile', compact('user'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, $id)
{
    $user = User::findOrFail($id);

    $file = $user->photo;

    if ($request->hasFile('photo')) {
        $file = Storage::put('photo', $request->file('photo'));
        Storage::disk('public')->delete($user->photo);
    }

    $data = [
        'name' => $request->name,
        'photo' => $file,
    ];

    // Only update the password if it's provided
    if ($request->filled('password')) {
        $data['password'] = $request->password;
    }

    $user->update($data);

    return redirect()->back()->with('success', 'Berhasil melakukan update profil');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
