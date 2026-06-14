<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $partners = Partner::all();
        
        
        return view('admin.partner.partner-list', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.add-partner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:3',
            'gambar' => 'required|image|mimes:png,jpg,jpeg,gif',
            'posisi' => 'required'
            
        ], [
            'judul.required' => 'Judul harus diisi',
            'gambar.required' => 'Gambar harus diisi',
            'judul.min' => 'Judul minimal 3 karakter',
            'gambar.mimes' => 'Format Gambar harus png/jpg/jpeg/gif',
            'gambar.image' => 'Harus foto/gambar',
            'posisi.required' => 'Posisi harus dipilih'
        ]);

        $partner = new Partner;
        $partner->judul = $request->judul;
        $partner->posisi=$request->posisi;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Simpan file ke storage/app/public/image_hero
            $file->storeAs('public/image_partner', $fileName);

            // Simpan nama file di database
            $partner->gambar = $fileName;
        }

        $partner->save();
        return redirect('/admin/partner-list')->with('success', 'Kamu berhasil menambahkan Partner baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::find($id);

        return view('admin.partner.edit-partner', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);


        $request->validate([
            'judul' => 'required|min:3',
            'gambar' => 'image|mimes:png,jpg,jpeg,gif',
            'posisi' => 'required'
            
        ], [
            'judul.required' => 'Judul harus diisi',
            'gambar.required' => 'Gambar harus diisi',
            'judul.min' => 'Judul minimal 3 karakter',
            'gambar.mimes' => 'Format Gambar harus png/jpg/jpeg/gif',
            'gambar.image' => 'Harus foto/gambar',
            'posisi.required' => 'posisi harus dipilih'
        ]);

        $partner->judul = $request->judul;
        $partner->posisi=$request->posisi;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($partner->gambar) {
                Storage::disk('public')->delete('image_partner/' . $partner->gambar);
            }

            // Simpan file baru ke storage/app/public/image_hero
            $file->storeAs('public/image_partner', $fileName);

            // Simpan nama file di database
            $partner->gambar = $fileName;
        }

        $partner->save();
        return redirect('/admin/partner-list')->with('update', 'Kamu berhasil meng-update partner!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);
        if ($partner) {
        // Hapus file gambar dari storage jika ada
        if ($partner->gambar && Storage::exists('public/image_partner/' . $partner->gambar)) {
            Storage::delete('public/image_partner/' . $partner->gambar);
        }

        // Hapus data dari database
        $partner->delete();

        return redirect('/admin/partner-list')->with('success', 'You have successfully deleted partner data');
    }

    return redirect('/admin/partner-list')->with('error', 'Partner data not found');
    }

    
}
