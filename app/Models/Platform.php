<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $table = 'platform';

    protected $fillable = [
        'id', 'name'
    ];


    public function getFields() {
        return $this->hasMany(Field::class, 'platform_id', 'id')->get();
    }


}
