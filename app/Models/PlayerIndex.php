<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerIndex extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $connection = 'mysqlPlayer';

    /**
     * @var string
     */
    protected $table = 'player_index';
}
