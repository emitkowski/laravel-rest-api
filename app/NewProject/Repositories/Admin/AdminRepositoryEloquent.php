<?php namespace NewProject\Repositories\Admin;

use NewProject\Repositories\EloquentRepositoryAbstract;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/*
 * This class is the Eloquent Implementation of the User Repository
 */

class AdminRepositoryEloquent extends EloquentRepositoryAbstract implements AdminRepositoryInterface, UserInterface, RemindableInterface {

    protected $table = 'admin';

    public $timestamps = true;

    protected $hidden = array('password');

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