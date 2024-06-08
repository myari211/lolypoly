<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use Notifiable, Uuid, SoftDeletes;
    // use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    protected $table = '10_transaction';
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
        'transaction_code',
        'midtrans_order_id',
        'user_id',
        'customer_address_id',
        'payment_method_id',
        'payment_method_name',
        'payment_virtual_number',
        'shipping_method_id',
        'shipping_name',
        'shipping_code',
        'shipping_service_name',
        'shipping_service_code',
        'shipping_duration',
        'shipping_price',
        'shipping_resi',
        'shipping_order_id',
        'shipping_tracking_id',
        'store_pickup_id',
        'payment_link',
        'promo_id',
        'sub_total',
        'discount',
        'total',
        'status',
        'row_status',
        'verification_at',
        'verification_by',
        'packing_at',
        'packing_by',
        'waiting_pickup_at',
        'pickup_at',
        'pickup_by',
        'finish_at',
        'finish_by',
        'created_by',
        'updated_by',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, "user_id", 'id');
    }
    public function detail()
    {
        return $this->hasMany(TransactionDetail::class, "transaction_id", 'id');
    }
    public function statusTransaction()
    {
        return $this->belongsTo(Status::class, "status", 'id');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, "store_pickup_id", 'id');
    }
    public function address()
    {
        return $this->belongsTo(CustomerAddress::class, "customer_address_id", 'id');
    }
}
