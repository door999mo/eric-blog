<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    const ADMIN = 1;
    const USER = 2;

    protected $table = 'roles';

    public function users()
    {
        return $this->hasMany('App\User', 'role_id', 'id');
    }

}
