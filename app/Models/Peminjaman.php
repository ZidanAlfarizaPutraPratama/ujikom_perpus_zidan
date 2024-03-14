<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $fillable = [
        'id_siswa',
        'id_buku',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
    ];

    // Define relationships
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}