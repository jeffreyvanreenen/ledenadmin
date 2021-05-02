<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'fields';

    protected $fillable = [
        'name', 'platform_id'
    ];

    public function getInvoerveldenFields() {
        return $this->hasMany(FieldData::class)->get();
    }




}
