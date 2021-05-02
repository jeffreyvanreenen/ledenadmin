<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoosterUser extends Model
{
    protected $table = 'bewakingsrooster_beschikbaarheid';

    protected $fillable = ['user_id', 'date_id', 'available'];


    public function getUser() {
        return $this->hasMany(User::class, 'id', 'user_id')->first()->getFullName();

    }
}
