<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends EloquentUser implements JWTSubject
{
    /**
     * @inheritDoc
     */
    public function getJWTIdentifier()
    {
        return $this->getUserId();
    }

    /**
     * @inheritDoc
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
