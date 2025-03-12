<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant_id', 'supplier_id', 'transaction_type', 'quantity', 'transaction_date', 'notes',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
