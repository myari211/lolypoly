<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Helpers\GeneralFunction;

class User extends Authenticatable
{
    use Notifiable, Uuid, SoftDeletes;
    // use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    protected $table = '98_user';
    protected $keyType = 'string';
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'name',
        'phone_number',
        'password',
        'role_id',
        'device_token',
        'created_by',
        'updated_by',
        'image',
        'type_user',
        'active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class,"id",'user_id');
    }

    public function role(){
        return $this->belongsTo(Role::class,"role_id",'id');
    }

    public function address(){
        return $this->hasMany(CustomerAddress::class, 'user_id');
    }

    
    public function getavatarUrlAttribute($value)
    {
        if(isset($this->avatar)){
            $res = GeneralFunction::checkExistImage($this->avatar);
        } else {
            $res = asset('/assets/images/default.jpg');
        }
        return $res;
    }
}
