<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoosterData extends Model
{
    protected $table = 'bewakingsrooster_data';


    public function getUsersPerDate() {
        return $this->hasMany(RoosterUser::class, 'date_id', 'id')->where('available', 1)->get();
    }

    public function totalUsers() {
        return $this->hasMany(RoosterUser::class, 'id', 'date_id')->where('available', 1)->count();
    }
}
