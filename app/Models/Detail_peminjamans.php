<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_peminjamans extends Model
{
    use HasFactory;
    // public function barangs(){
    //     return $this->belongsTo(Barang::class);
    // }
    // public function peminjamans(){
    //     return $this->belongsTo(Peminjamans::class);
    // }
    public function peminjaman()
    {
        return $this->belongsTo(Peminjamans::class);
    }

    // Relationship with User model (assuming foreign key for user is 'user_id')
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // Relationship with Barang model (assuming foreign key for barang is 'barang_id')
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

}
