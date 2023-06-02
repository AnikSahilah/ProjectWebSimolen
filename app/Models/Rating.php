<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = "tb_rating";
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
