<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'sertifikat_vaksin',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'umur',
        'no_ktp',
        'tinggi_badan',
        'berat_badan',
        'no_telp',
        'email',
        'foto',
        'provinsi',
        'kabupaten',
        'alamat_lengkap',
        'tahun_lulus',
        'pengalaman',
    ];
}
