<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldData extends Model
{
    protected $table = 'field_data';

    protected $fillable = [
        'user_id','field_id', 'value', 'updated_at', 'created_at'
    ];

    public function getFieldName() {
        return $this->hasOne(Field::class, 'id', 'field_id')->first();
    }
}
