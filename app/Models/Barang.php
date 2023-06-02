<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = "tb_barang";
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class, 'bengkel_id');
    }


    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }
}
