<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Uuid\Uuid;

class Permission extends Model
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

     /**
     * To get all users of permissions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        //return $this->setConnection('mysql')->belongsTo(User::class);
        return $this->belongsToMany(User::class, "'user_permissions'");
    }

     /**
     * To get all clients of permissions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function clients(): BelongsToMany
    {
        //return $this->setConnection('mysql')->belongsTo(User::class);
        return $this->belongsToMany(Client::class, "client_permissions");
    }


}
