<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'jenis_barang_id', 
        'nama_barang', 
        'deskripsi', 
        'total', 
        'image', 
        'status'
    ];

    // Relasi dengan JenisBarang
    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang_id');
    }

    // Relasi dengan Requests
    public function requests()
    {
        return $this->hasMany(Requests::class, 'barang_id');
    }
}
