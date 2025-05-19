<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pelanggan',
        'nama_pelanggan',
        'jenis_kelamin',
        'jumlah_kunjungan',
        'minuman_favorit',
        'total_pembelian',
        'member',
    ];

    protected $casts = [
        'member' => 'boolean',
    ];
}
