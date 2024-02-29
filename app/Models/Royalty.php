<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Royalty extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeSearch($query, $request, array $columns)
    {
        $query->where(function ($query) use ($request, $columns) {
            foreach ($columns as $column) {
                $query->orWhere($column, 'like', "%$request->search%");
            }
        });
    }
}
