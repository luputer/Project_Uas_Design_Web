<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partai extends Model
{
    /** @use HasFactory<\Database\Factories\PartaiFactory> */
    protected $table = 'partais';

    protected $fillable = [
        'nama_partai',
        'nomor_urut',
        'logo',
        'alamat_kantor',
        'ketua_partai',
        'sekretaris_partai'
    ];

    public function caleg()
    {
        return $this->hasMany(Caleg::class);
    }
}
