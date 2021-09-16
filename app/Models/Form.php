<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $guarded=[''];
    
    public function ScopeFilter($query,$filter)
    {
        return $query->whereRaw('LOWER(name) LIKE (?) ',["%{$filter}%"])
                     ->orWhere('age','like','%'.$filter.'%')
                     ->orWhere('phone','like','%'.$filter.'%')
                     ->orWhereRaw('LOWER(city) LIKE (?) ',["%{$filter}%"]);
    }

    public function ScopeBetweenDate($query,$startdate,$enddate)
    {
        return $query->whereBetween('created_at', [$startdate, $enddate]);
    }

}
