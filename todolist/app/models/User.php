<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

  public $timestamps = false;
  
  protected $fillable = [
  "username",
  "password"
  ];

/**
 * The database table used by the model.
 *
 * @var string
 */
protected $table = 'users';

/**
 * The attributes excluded from the model's JSON form.
 *
 * @var array
 */
protected $hidden = array('password');

/**
 * Get the unique identifier for the user.
 *
 * @return mixed
 */
public function getAuthIdentifier()
{
  return $this->getKey();
}

/**
 * Get the username for the user.
 *
 * @return string
 */
public function getAuthUsername()
{
  return $this->username;
}


/**
 * Get the password for the user.
 *
 * @return string
 */
public function getAuthPassword()
{
  return $this->password;
}

/**
 * Get the e-mail address where password reminders are sent.
 *
 * @return string
 */
public function getReminderEmail()
{
  return $this->email;
}

public function getRememberToken()
{
   return null; // not supported
 }

 public function setRememberToken($value)
 {
   // not supported
 }

 public function getRememberTokenName()
 {
   return null; // not supported
 }

 /**
  * Overrides the method to ignore the remember token.
  */
 public function setAttribute($key, $value)
 {
   $isRememberTokenAttribute = $key == $this->getRememberTokenName();
   if (!$isRememberTokenAttribute)
   {
     parent::setAttribute($key, $value);
   }
 }

}

