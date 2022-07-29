<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];


    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%'.request('search').'%');
        }
    }

    public function pharmacies(){
        return $this->hasMany(Pharmacy::class, 'city_name', 'name')->count('*');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
