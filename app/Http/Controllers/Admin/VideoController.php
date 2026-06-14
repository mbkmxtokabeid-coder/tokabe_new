<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use App\Models\Lokasi;
use App\Models\Heroe;
use App\Models\Video;


class VideoController extends Controller
{
    public function index()
    {
        $video = Video::all();


        return view('admin.video.index', compact('video'));
    }

    public function edit($id)
    {
        $item = Video::find($id);

        return view('admin.video.update-video', compact('item'));
    }

    public function create()
    {
        return view('admin.video.create-video');
    }


    public function createVideo(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'video' => 'required',
            
         

        ], [
            'nama.required' => 'Nama harus diisi',
            'video.required' => 'Video harus diisi',
            

            



        ]);

        $video = new Video;
        $video->nama = $request->nama;




        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Simpan file ke storage/app/public/image_lokasi
            $file->storeAs('public/image_video', $fileName);

            // Simpan nama file di database
            $video->video = $fileName;
        }

        $video->save();
        return redirect('/admin/video-list')->with('success', 'Kamu berhasil menambahkan video baru!');
    }

    public function updatevideo(Request $request, $id)
    {
        $item = video::find($id);


        $validated = $request->validate([
            'nama' => 'required|min:3',
            
            // 'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $item->nama = $request->nama;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($item->video) {
                Storage::disk('public')->delete('image_video/' . $item->video);
            }

            // Simpan file baru ke storage/app/public/image_hero
            $file->storeAs('public/image_video', $fileName);

            // Simpan nama file di database
            $item->video = $fileName;
        }

        $item->save();
        return redirect('/admin/video-list')->with('update', 'Kamu berhasil meng-update Video!');
    }

    public function delete($id)
    {
        $video = Video::find($id);
        $video->delete();

        return redirect('admin/video-list')->with('delete', 'Kamu berhasil menghapus!');
    }


    public function show($nama)
    {
        $lokasi = Lokasi::where('nama', $nama)->first();
        if (!$lokasi) {
            session()->flash('status', 'error');
            session()->flash('message', 'Data Tidak Ditemukan');
            return redirect()->back();
        }

    // Pisahkan koordinat menjadi latitude dan longitude
    list($latitude, $longitude) = explode(',', $lokasi->koordinat);

    // Tambahkan latitude dan longitude ke dalam array untuk dikirim ke view
    return view('pages.lokasi.periklanan', compact('lokasi', 'latitude', 'longitude'));
    }
}
