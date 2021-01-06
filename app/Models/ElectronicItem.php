<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectronicItem extends Model
{
    use HasFactory;

    protected $table = 'electronic_items';

    public function type()
    {
        return $this->belongsTo(ElectronicType::class, 'electronic_type_id');
    }
}
