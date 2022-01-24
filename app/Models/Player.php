<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends BaseModel
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

    /**
     * Get account
     */
    public function account()
    {
        return $this->belongsTo(Account::class, 'id', 'account_id');
    }

    /**
     * Get guild member
     */
    public function guildMember()
    {
        return $this->hasOne(GuildMember::class, 'pid', 'id');
    }

    /**
     * Get player index
     */
    public function playerIndex()
    {
        return $this->hasOne(PlayerIndex::class, 'id', 'account_id');
    }
}
