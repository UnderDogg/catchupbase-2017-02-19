<?php

namespace App\Models\Access\User;

use App\Models\Access\User\Traits\Attribute\UserAttribute;
use App\Models\Access\User\Traits\Relationship\UserRelationship;
use App\Models\Access\User\Traits\UserAccess;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innovate\BaseModel;

/**
 * Class User.
 */
class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable,
        CanResetPassword,
        SoftDeletes,
        UserAccess,
        UserRelationship,
        UserAttribute;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * For soft deletes.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @return mixed
     */
    public function canChangeEmail()
    {
        return config('access.users.change_email');
    }

    /**
     * @return mixed
     */
    public function canChangePassword()
    {
        return !app('session')->has(config('access.socialite_session_name'));
    }

    /**
     * @return bool
     */
    public function isBanned()
    {
        return $this->status == 2;
    }

    /**
     * @return bool
     */
    public function isDeactivated()
    {
        return $this->status == 0;
    }
}
