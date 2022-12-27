<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query->where(fn($query) => $query->where('aciklama', 'like', '%' . $search . '%'))
        );
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function kalip(){
        return $this->belongsTo(kalip::class);
    }
}
