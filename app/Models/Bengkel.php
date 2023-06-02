<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    use HasFactory;

    protected $table = "tb_bengkel";
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function montir()
    {
        return $this->hasMany(Montir::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class, 'bengkel_id');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
}
