<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $connection = 'mysqlPlayer';

    /**
     * @var string
     */
    protected $table = 'player';

    public function account()
    {
        return $this->belongsTo(Account::class, 'id', 'account_id');
    }

    public function guildMember()
    {
        return $this->hasOne(GuildMember::class, 'pid', 'id');
    }

    public function playerIndex()
    {
        return $this->hasOne(PlayerIndex::class, 'id', 'account_id');
    }
}
