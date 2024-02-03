<?php

namespace App\Http\Controllers;

use App\Charts\ProductChart;
use App\Http\Requests\CarouselStoreRequest;
use App\Http\Requests\StoreSosmedRequest;
use App\Http\Requests\UpdateSosmedRequest;
use App\Models\Carousel;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CarouselController extends Controller
{
    public function index(ProductChart $productChart)
    {
        $carousels = Carousel::all();
        $sosmeds = Sosmed::all();
        return view('admin.dashboard', compact('carousels', 'sosmeds'), ['chart' => $productChart->build()]);
    }

    public function store(CarouselStoreRequest $request)
    {
        $data = $request->all();
        $foto = $request->file('foto');
        $data['foto'] = Str::random(20) . '.' . $foto->getClientOriginalExtension();
        Storage::disk('public')->put($data['foto'], file_get_contents($foto));
        Carousel::create($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan postingan baru.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $carousel = Carousel::findOrFail($id);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $data['foto'] = Str::random(20) . '.' . $foto->getClientOriginalExtension();
            Storage::disk('public')->put($data['foto'], file_get_contents($foto));
            Storage::disk('public')->delete($carousel->foto);
        } else {
            $data['foto'] = $carousel->foto;
        }
        $carousel->update($data);
        return redirect()->back()->with('success', 'Berhasil mengubah postingan');
    }

    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);
        Storage::disk('public')->delete($carousel->foto);
        $carousel->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus postingan');
    }
    
    public function sosmedStore(StoreSosmedRequest $request)
    {
        $data = $request->all();
        $icon = $request->file('icon');
        $data['icon'] = Str::random(20) . '.' . $icon->getClientOriginalExtension();
        Storage::disk('public')->put($data['icon'], file_get_contents($icon));
        Sosmed::create($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan sosial media baru.');
    }

    public function sosmedUpdate(UpdateSosmedRequest $request, $id)
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

    public function sosmedDestroy($id)
    {
        return 'holaa';
        $sosmed = Sosmed::findOrFail($id);
        Storage::disk('public')->delete($sosmed->icon);
        $sosmed->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus sosial media');
    }
    
}
