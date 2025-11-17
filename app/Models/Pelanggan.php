<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;

class Pelanggan extends Model
{
    protected $table        = 'pelanggan';
    protected $primaryKey   = 'pelanggan_id';
    protected $fillable     = [
=======

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'pelanggan_id';
    protected $fillable = [
>>>>>>> be6cabad91de1508e88db3ee31484b03523d920c
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone',
    ];
<<<<<<< HEAD
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
{
    foreach ($filterableColumns as $column) {
        if ($request->filled($column)) {
            $query->where($column, $request->input($column));
        }
    }
    return $query;
    }
}
=======
}
>>>>>>> be6cabad91de1508e88db3ee31484b03523d920c
