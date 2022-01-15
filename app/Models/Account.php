<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;
    protected $rememberTokenName = false;

    protected $fillable = ['login', 'email', 'password', 'social_id'];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @var string
     */
    protected $table = 'account';

    /**
     * Get players of account
     */
    public function players()
    {
        return $this->hasMany(Player::class, 'id', 'account_id');
    }
}
