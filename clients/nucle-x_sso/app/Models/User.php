<?php

namespace App\Models;

use App\Models\Traits\Clients\ClientTrait;
use App\Models\Traits\Clients\RolesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Ramsey\Uuid\Uuid;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, RolesTrait, ClientTrait;

    public $permissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
        "phones" => "array",
        'email' => 'array',
        'avatar' => 'array'
    ];

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';



       /**
     * Find the user instance for the given phone_number.
     *
     * @param  string  $phone
     * @return \App\Models\User
     */
    public function findForPassport($username)
    {
        //return $this->where('phone', $username)->->first();
       // return self::firstWhere('email->active', $username) ?? self::firstWhere('phone->active',  $username);

       return self::where('email->active', $username)
                ->orWhere('phones->active',  $username)
                ->orWhere('username',  $username)
                ->orWhere('social_id',  $username)->first();


    }

    public function validateForPassportPasswordGrant($password)
    {
        // if($password == "social_auth"){
        //     return true;
        // }

        return true;

    }
    /**
     * this function find user with email or username or phone and password
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public static function AuthByPhoneOrEmailOrUsername(Object $args)
    {
        return self::where(['email->active' => $args->login, "password" =>   $args->password])
        ->orWhere(['phones->active' =>  $args->login, "password" =>   $args->password])
        ->orWhere(['username' =>  $args->login, "password" =>   $args->password]);
    }

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
     * Get all roles of uses
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        //return $this->setConnection('mysql')->belongsTo(User::class);
        return $this->belongsToMany(Role::class, 'role_users');
    }

          /**
     * Get all clients
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients(): HasMany
    {
        //return $this->setConnection('mysql')->belongsTo(User::class);
        return $this->hasMany(OauthClient::class);
    }

     /**
     * To get all users of roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        //return $this->setConnection('mysql')->belongsTo(User::class);
            $this->permissions[] = $this->roles()->permissions();
            $this->permissions[] = $this->belongsToMany(Permission::class, "permission_users");

            return $this;
        //return $this->belongsToMany(Permission::class, "permission_users");
    }


}
