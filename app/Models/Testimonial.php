<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Helpers\GeneralFunction;

class Testimonial extends Model
{
    use HasFactory;
    use Notifiable, Uuid, SoftDeletes;
    // use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    protected $table = '10_testimonial';
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
        "image",
        "name",
        "description",
        "stars",
        "row_status",
        'created_by',
        'updated_by',
    ];

    public function getImageUrlAttribute($value)
    {
        $path_images = public_path().'/'.$this->image;
        $url_images = url('/').'/'.$this->image;
        $images_default = asset('images/img-default.png');
        if (isset($this->image)) {
            if(file_exists($path_images)) {
                $images_url = $url_images;
            }
            else {
                $images_url = $images_default;
            } 
        } else {
            $images_url = $images_default;
        }
        
        return $images_url;
    }
}
