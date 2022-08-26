<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Uuid\Uuid;

class Role extends Model
{
    use HasFactory;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

      /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'pivot',
    ];

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

     /**
     * To get all users of roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        //return $this->setConnection('mysql')->belongsTo(User::class);
        return $this->belongsToMany(User::class, "role_users");
    }

     /**
     * To get all users of roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        //return $this->setConnection('mysql')->belongsTo(User::class);
        return $this->belongsToMany(Permission::class, "permission_roles");
    }
}
