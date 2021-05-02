<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldUpdated extends Model
{
    protected $table = 'field_updated';

    protected $fillable = [
        'user_id','field_id', 'value', 'datetime_updated'
    ];
}
