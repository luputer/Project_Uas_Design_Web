<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caleg extends Model
{
    /** @use HasFactory<\Database\Factories\CalegFactory> */
    protected $table = 'caleg';

    protected $fillable = [
        'partai_id',
        'dapil_id',
        'nomor_urut',
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'pekerjaan',
        'pendidikan_terakhir',
        'foto',
        'status_verifikasi',
        'catatan_verifikasi'
    ];

    public function partai()
    {
        return $this->belongsTo(Partai::class);
    }

    public function dapil()
    {
        return $this->belongsTo(Dapil::class);
    }

    public function dokumen()
    {
        return $this->hasMany(DokumenCaleg::class);
    }
}
