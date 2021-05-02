<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'platform_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin() {
        return $this->roles()->where('name', 'Admin')->exists();
    }

    public function isUser() {
        return $this->roles()->where('name', 'User')->exists();
    }

    public function getUserFields() {
        return $this->hasMany(FieldData::class)->get();
    }

    public function getValue($value) {
        $field = Field::where([
            'platform_id' => 1,
            'name' => $value
            ])->first();
        if($field) {
           $value = $this->hasOne(FieldData::class)->where('field_id', $field->id)->first();
           if($value) {
               return $value->value;
           }
           return '';
        }

        return '?';

    }

    public function getFullName() {

        $firstName = $this->getValue('Roepnaam');
        $lastName = $this->getValue('Achternaam');
        $insertion = $this->getValue('Tussenvoegsel(s)');

        return $lastName . ', '. $firstName . ' ' .$insertion;
    }

}
