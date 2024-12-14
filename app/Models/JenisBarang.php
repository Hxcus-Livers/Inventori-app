<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    protected $table = 'jenis_barang';

    protected $fillable = [
        'nama_jenis_barang', 
        'total_barang'
    ];

    // Relasi dengan Barang
    public function barangs()
    {
        return $this->hasMany(Barang::class, 'jenis_barang_id');
    }

    // Relasi dengan Requests
    public function requests()
    {
        return $this->hasMany(Requests::class, 'jenis_barang_id');
    }
}
