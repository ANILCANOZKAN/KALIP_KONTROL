<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kalip extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search)=>
        $query->where(fn($query) =>
        $query->where('ad', 'like', '%' .$search. '%'))
        );

        $query->when($filters['category'] ?? false, fn($query, $category)=>
        $query->whereHas('category' , fn($query) =>
        $query->where('id', $category)));
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }
}
