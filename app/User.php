<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Encryptable;



    public function __construct() {
    }

    public static $recordEncryptionKey= "wedgsgbsdr4bey57ere5y7beyb75eb7s";
    protected $encryptable = [
        'password','address'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


}
