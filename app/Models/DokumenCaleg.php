<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenCaleg extends Model
{
    /** @use HasFactory<\Database\Factories\DokumenCalegFactory> */
    protected $table = 'dokumen_calegs';

    protected $fillable = [
        'caleg_id',
        'jenis_dokumen',
        'file_path',
        'status_verifikasi',
        'catatan'
    ];

    public function caleg()
    {
        return $this->belongsTo(Caleg::class);
    }
}
