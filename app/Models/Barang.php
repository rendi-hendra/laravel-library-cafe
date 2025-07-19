<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Barang extends Model
{
    use HasFactory, Notifiable;
     // Jika nama tabel tidak jamak, spesifikasikan nama tabel
    protected $table = 'barang';

    // Kolom yang bisa diisi massal (fillable)
    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'gambar',
        'keterangan',
        'status', // jika kamu pakai status (misal: aktif/tidak)
    ];

    // Jika tidak pakai timestamps (created_at, updated_at), matikan ini
    public $timestamps = false;
}
