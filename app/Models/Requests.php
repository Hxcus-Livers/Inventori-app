<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = [
        'user_id', 
        'nama_peminjam', 
        'jenis_barang_id', 
        'barang_id', 
        'lama_meminjam', 
        'item_name', 
        'quantity', 
        'status'
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan JenisBarang
    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang_id');
    }

    // Relasi dengan Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
