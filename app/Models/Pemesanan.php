<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = "tb_pemesanan";
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['tanggal_pemesanan'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function montir()
    {
        return $this->belongsTo(Montir::class, 'montir_id');
    }
}
