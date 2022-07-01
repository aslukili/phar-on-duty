<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%'.request('search').'%');
        }
    }

    public function pharmacies(){
        return $this->hasMany(Pharmacy::class, 'city_name', 'name')->count('*');
    }
}
