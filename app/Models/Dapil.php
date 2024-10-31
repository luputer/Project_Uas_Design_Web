<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dapil extends Model
{
    protected $table = 'dapils';

    protected $fillable = [
        'nama_dapil',
        'wilayah_cakupan',
        'jumlah_kursi'
    ];

    public function caleg()
    {
        return $this->hasMany(Caleg::class);
    }
}
