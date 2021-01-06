<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectronicItem extends Model
{
    use HasFactory;

    protected $table = 'electronic_items';

    public function contains_extras()
    {
        return $this->belongsToMany(ElectronicItem::class, 'extras', 'origin_electronic_item_id', 'destination_electronic_item_id');
    }

    public function contained_in_extras()
    {
        return $this->belongsToMany(ElectronicItem::class, 'extras', 'destination_electronic_item_id', 'origin_electronic_item_id');
    }

    public function type()
    {
        return $this->belongsTo(ElectronicType::class, 'electronic_type_id');
    }
}
