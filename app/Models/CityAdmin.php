<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityAdmin extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'email', 'password', 'phone'];

    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false) {
            $query->where('full_name', 'like', '%'.request('search').'%');
        }
    }
}
