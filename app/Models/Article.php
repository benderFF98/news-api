<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'text',
        'source',
        'url',
    ];

    public function scopeSearch(Builder $query, $value): Builder
    {
        return $query->where('title', 'like', '%' . $value . '%')
            ->orWhere('source', 'like', '%' . $value . '%');
    }
}
