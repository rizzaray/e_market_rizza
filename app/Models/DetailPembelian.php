<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';
    protected $fillable = ['id', 'penjualan_id', 'barang_id', 'harga_beli', 'jumlah', 'sub_total', 'created_at', 'updated_at'];
}
