<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pendaftar;
use Carbon\Carbon;

class PendaftarController extends Controller
{
    public function create()
    {
        return view('pendaftaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'              => 'required|string|max:255',
            'jenis_kelamin'     => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir'      => 'required|string|max:255',
            'tanggal_lahir'     => 'required|date',
            'no_ktp'            => 'required|string|max:20',
            'tinggi_badan'      => 'required|numeric',
            'berat_badan'       => 'required|numeric',
            'no_telp'           => 'required|string|max:20',
            'email'             => 'required|email|max:255',
            'foto_diri'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'provinsi'          => 'required|string',
            'kabupaten'         => 'required|string',
            'alamat_lengkap'    => 'required|string',
            'tahun_lulus'       => 'required|string',
            'pengalaman'        => 'required|string',
            'sertifikat_vaksin' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $umur = Carbon::parse($request->tanggal_lahir)->age;

        $fotoPath = $request->file('foto_diri')->store('foto_diri', 'public');

        $sertifikatPath = $request->file('sertifikat_vaksin') 
            ? $request->file('sertifikat_vaksin')->store('sertifikat_vaksin', 'public') 
            : null;

        Pendaftar::create([
            'nama'                  => $request->nama,
            'jenis_kelamin'         => $request->jenis_kelamin,
            'tempat_lahir'          => $request->tempat_lahir,
            'tanggal_lahir'         => $request->tanggal_lahir,
            'umur'                  => $umur,
            'no_ktp'                => $request->no_ktp,
            'tinggi_badan'          => $request->tinggi_badan,
            'berat_badan'           => $request->berat_badan,
            'no_telp'               => $request->no_telp,
            'email'                 => $request->email,
            'foto_diri'             => $fotoPath,
            'provinsi'              => $request->provinsi,
            'kabupaten'             => $request->kabupaten,
            'alamat_lengkap'        => $request->alamat_lengkap,
            'tahun_lulus'           => $request->tahun_lulus,
            'pengalaman'            => $request->pengalaman,
            'sertifikat_vaksin'     => $sertifikatPath,
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil!');
    }

    
    public function getProvinsi()
    {
        $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
        return $response->json();
    }

    public function getKabupaten($id)
    {
        $response = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$id}.json");
        return $response->json();
    }
    
}
