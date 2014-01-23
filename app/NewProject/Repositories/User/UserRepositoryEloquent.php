<?php namespace NewProject\Repositories\User;

use NewProject\Repositories\EloquentRepositoryAbstract;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/*
 * This class is the Eloquent Implementation of the User Repository
 */

class UserRepositoryEloquent extends EloquentRepositoryAbstract implements UserRepositoryInterface, UserInterface, RemindableInterface {

    protected $table = 'user';

    protected $hidden = array('password', 'reset_key');

    /*
    * Full Name Attribute Accessor.
    *
    * @return Collection
    */
    public function getFullNameAttribute() {
        return $this->first_name.' '.$this->last_name;
    }

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

}