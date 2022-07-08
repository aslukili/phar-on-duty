<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar', 'name_fr', 'address_ar', 'address_fr', 'tel', 'email', 'map_link', 'city_name'];

    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false) {
            $query->where('name_fr', 'like', '%'.request('search').'%')
            ->orWhere('city_name', 'like', '%'.request('search').'%');
        }

        if($filters['city'] ?? false) {
            $query->where('city_name', '=', request('city'));
        }
    }

    public function guardPharmacy()
    {
        return $this->belongsTo(GuardPharmacy::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
