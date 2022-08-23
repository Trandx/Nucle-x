<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Client extends Model
{
    use HasFactory;

    public $incrementing = false;


    /**
    *The attributes that are not mass assignable.
    *
    * @var Array $guarded <int, string>
    */

    protected $guarded = ["id"];
     // All fields inside the $guarded array are not mass-assignable
     //

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

        /**
     * custom boot user ids
     */

    public static function boot()
    {

        parent::boot();

        self::creating(function ($model) {

            $model->id = Uuid::uuid4()->toString();

        });

    }

    public function isAnable(){
        return $this->anable;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'client_permission');

    }
}
