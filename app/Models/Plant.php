<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'species', 'description',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }
}