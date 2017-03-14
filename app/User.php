<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	public function posts()
	{
		return $this->hasMany('App\Post');
	}

	public function likes()
	{
	   	return $this->hasMany('App\Like');
	}
    
}
