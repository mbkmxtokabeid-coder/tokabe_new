<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use App\Models\Brand;
use App\Models\Heroe;


class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.brand-list', compact('brands'));
    }


    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit-brand', compact('brand'));
    }

    public function create()
    {
        return view('admin.brand.add-brand');
    }


    public function store(Request $request)
{
    $validated = $request->validate([
        'judul_id' => 'required|min:3',
        'judul_en' => 'required|min:3',
        'judul_tab_id' => 'required|min:3',
        'judul_tab_en' => 'required|min:3',
        'deskripsi_id' => 'required|min:10',
        'deskripsi_en' => 'required|min:10',
        'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        'details' => 'required|array',
        'details.*.title_id' => 'required|min:3',
        'details.*.title_en' => 'required|min:3',
        'details.*.description_id' => 'required|min:10',
        'details.*.description_en' => 'required|min:10',
    ], [
        'judul_id.required' => 'Judul (ID) harus diisi',
        'judul_en.required' => 'Judul (EN) harus diisi',
        'judul_tab_id.required' => 'Masukkan judul tab (ID)',
        'judul_tab_en.required' => 'Masukkan judul tab (EN)',
        'deskripsi_id.required' => 'Deskripsi (ID) harus diisi',
        'deskripsi_en.required' => 'Deskripsi (EN) harus diisi',
        'gambar.required' => 'Gambar harus diisi',
        'gambar.mimes' => 'Format Gambar harus png/jpg/jpeg',
        'gambar.image' => 'Harus foto/gambar',
        'gambar.max' => 'Ukuran maksimal 2Mb',
    ]);

    $brand = new Brand;
    $brand->judul = [
        'id' => $request->judul_id,
        'en' => $request->judul_en
    ];
    $brand->tab_title = [
        'id' => $request->judul_tab_id,
        'en' => $request->judul_tab_en
    ];
    $brand->deskripsi = [
        'id' => $request->deskripsi_id,
        'en' => $request->deskripsi_en
    ];

    $details = [];

    foreach ($request->details as $detail) {
        $imageName = null;

        if (isset($detail['image'])) {
            $imageName = uniqid() . '.' . $detail['image']->getClientOriginalExtension();
            $detail['image']->storeAs('public/image_brand_details', $imageName);
        }

        $details[] = [
            'title' => [
                'id' => $detail['title_id'] ?? '',
                'en' => $detail['title_en'] ?? ''
            ],
            'description' => [
                'id' => $detail['description_id'] ?? '',
                'en' => $detail['description_en'] ?? ''
            ],
            'image_url' => $imageName
        ];
    }

    $brand->detail = $details;

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Simpan file ke storage/app/public/image_brand
        $file->storeAs('image_brand', $fileName, 'public');
        
        // Simpan nama file di database
        $brand->gambar = $fileName;
    }

    $brand->save();

    return redirect()->route('brand-list')->with('success', 'Brand berhasil ditambahkan!');
}

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);

        $validated = $request->validate([
            'judul_id' => 'required|min:3',
            'judul_en' => 'required|min:3',
            'judul_tab_id' => 'required|min:3',
            'judul_tab_en' => 'required|min:3',
            'deskripsi_id' => 'required|min:10',
            'deskripsi_en' => 'required|min:10',
           // 'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $brand->judul = [
            'id' => $request->judul_id,
            'en' => $request->judul_en
        ];
        $brand->tab_title = [
            'id' => $request->judul_tab_id,
            'en' => $request->judul_tab_en
        ];
        $brand->deskripsi = [
            'id' => $request->deskripsi_id,
            'en' => $request->deskripsi_en
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            if ($brand->gambar) {
                Storage::disk('public')->delete('image_brand/' . $brand->gambar);
            }
            $file->storeAs('image_brand', $fileName, 'public');
            $brand->gambar = $fileName;
        }

        $details = [];
        if ($request->has('details')) {
            foreach ($request->details as $index => $detail) {
                if (isset($detail['_delete']) && $detail['_delete']) {
                    if (!empty($detail['existing_image'])) {
                        Storage::delete('public/image_brand_details/' . $detail['existing_image']);
                    }
                    continue;
                }
    
                $imageName = $detail['existing_image'] ?? null;
                if (isset($detail['image'])) {
                    if (!empty($detail['existing_image'])) {
                        Storage::delete('public/image_brand_details/' . $detail['existing_image']);
                    }
    
                    $imageName = uniqid() . '.' . $detail['image']->getClientOriginalExtension();
                    $detail['image']->storeAs('public/image_brand_details', $imageName);
                }
    
                $details[] = [
                    'title' => [
                        'id' => $detail['title_id'] ?? '',
                        'en' => $detail['title_en'] ?? ''
                    ],
                    'description' => [
                        'id' => $detail['description_id'] ?? '',
                        'en' => $detail['description_en'] ?? ''
                    ],
                    'image_url' => $imageName
                ];
            }
        }

        $brand->detail = $details;

        $brand->save();
        return redirect()->route('brand-list')->with('success', 'Kamu berhasil meng-update brand!');;
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        if ($brand->gambar) {
            Storage::delete('public/image_brand/' . $brand->gambar);
        }

        if ($brand->detail) {
            $details = $brand->detail;
            foreach ($details as $detail) {
                if (!empty($detail['image_url'])) {
                    Storage::delete('public/image_brand_details/' . $detail['image_url']);
                }
            }
        }

        $brand->delete();
        return redirect('admin/brand-list')->with('delete', 'Kamu berhasil menghapus!');
    }
}
