<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::all();

        foreach ($pesans as $pesan) {
            $pesan->formattedPesan = substr($pesan->pesan, 0, 29);
            $pesan->formattedSubject = substr($pesan->subject, 0, 19);
            $pesan->formattedNama = substr($pesan->nama, 0, 19);
            $pesan->formattedNoTlp = substr($pesan->nomor_telepon, 0, 14);
            $pesan->formattedEmail = substr($pesan->email, 0, 19);
        }
        return view('admin.pesan.index', compact('pesans'));
    }

    public function create()
    {
        return view('pages.contact-us');
    }

    public function store(Request $request)
    {
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'name' => 'required',
        //         'phone' => 'required|numeric',
        //         'email' => 'required|email',
        //         'message' => 'required',
                // 'g-recaptcha-response' => 'required|captcha',
        //     ],
        //     [
        //         'name.required' => 'Kolom nama wajib diisi.',
        //         'phone.required' => 'Kolom nomor telepon wajib diisi.',
        //         'phone.numeric' => 'Kolom nomor telepon wajib diisi dengan angka.',
        //         'email.required' => 'Kolom email wajib diisi.',
        //         'email.email' => 'Format email tidak valid.',
        //         'message.required' => 'Kolom pesan wajib diisi.',
                // 'g-recaptcha-response.required' => 'Harap selesaikan reCAPTCHA.',
                // 'g-recaptcha-response.captcha' => 'reCAPTCHA tidak valid, harap coba lagi.',
        //     ],
        // );

        // if ($validator->fails()) {
        //     Alert::warning('Gagal, Ada inputan yang tidak terisi');
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // Pesan::create([
        //     'nama' => $request->name,
        //     'nomor_telepon' => $request->phone,
        //     'subject' => $request->subject,
        //     'email' => $request->email,
        //     'pesan' => $request->message,
        // ]);

        // Alert::success('Pesan berhasil dikirimkan');
        // return redirect()->back();

        // Batas
        $request->validate(
            [
                'name' => 'required|min:3',
                'phone' => 'required|numeric',
                'email' => 'required|email',
                'message' => 'required',
                'g-recaptcha-response' => 'required|captcha',
            ],
            [
                'name.required' => 'Kolom nama wajib diisi.',
                'name.min' => 'Kolom nama minimal 3 inputan karakter.',
                'phone.required' => 'Kolom nomor telepon wajib diisi.',
                'phone.numeric' => 'Kolom nomor telepon wajib diisi dengan angka tanpa spasi atau karakter lain.',
                'email.required' => 'Kolom email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'message.required' => 'Kolom pesan wajib diisi.',
                'g-recaptcha-response.required' => 'Harap selesaikan reCAPTCHA.',
                'g-recaptcha-response.captcha' => 'reCAPTCHA tidak valid, harap coba lagi.',
            ],
        );

        $pesan = new Pesan();
        $pesan->nama = $request->name;
        $pesan->nomor_telepon = $request->phone;
        $pesan->email = $request->email;
        $pesan->subject = $request->subject;
        $pesan->pesan = $request->message;

        $pesan->save();

        return redirect('/contact-us')->with('success', 'Kamu berhasil mengirimkan pesan!');
    }

    public function show($id)
    {
        $pesan = Pesan::find($id);
        if ($pesan) {
            $pesan->status = 1; // Ubah status pesan menjadi telah dibaca
            $pesan->save();
            $wa = $pesan->nomor_telepon;
            $wa = preg_replace('/[^0-9]/', '', $wa);
            if (substr($wa, 0, 1) == 0) {
                $wa = '62' . substr($wa, 1);
            }

            $pesanWa = 'https://api.whatsapp.com/send?phone=' . $wa . '&text=Halo%20Bapak/Ibu%20' . $pesan->nama . '%20Menanggapi%20Pesan%20perihal%20' . $pesan->subject . ',%20';

            return view('admin.pesan.detail', compact('pesan', 'pesanWa'));
        }
        Alert::error('Pesan tidak ditemukan');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();

        return redirect('admin.pesan.index')->with('Success', 'Kamu berhasil menghapus pesan');
    }
}
