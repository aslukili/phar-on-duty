<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuardPharmacy extends Model
{
    use HasFactory;

    protected $fillable = ['city_name_fk', 'pharmacy_fk', 'open_time', 'close_time'];




    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }
}
