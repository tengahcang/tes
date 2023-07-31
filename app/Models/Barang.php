<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public function laporan(){
        return $this->hasMany(Laporan::class);
    }
    public function detail_peminjaman(){
        return $this->hasMany(Detail_peminjamans::class);
    }
    public function detailpaket(){
        return $this->hasMany(Detail_paket::class);
    }
}
