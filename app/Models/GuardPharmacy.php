<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuardPharmacy extends Model
{
    use HasFactory;

    protected $fillable = ['city_name_fk', 'pharmacy_fk', 'open_time', 'close_time'];


    public function scopeFilter($query, array $filters)
    {
        if($filters['city'] ?? false) {
            $query->where('city_name_fk', 'like', '%'.request('city').'%');
        }
    }

    public function pharmacy()
    {
        return $this->hasOne(Pharmacy::class, 'id', 'pharmacy_fk');
    }
}
