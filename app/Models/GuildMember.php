<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuildMember extends BaseModel
{
    use HasFactory;
    /**
     * @var string
     */
    protected $connection = 'mysqlPlayer';

    /**
     * @var string
     */
    protected $table = 'guild_member';

    /**
     * Get guild
     */
    public function guild()
    {
        return $this->hasOne(Guild::class, 'id', 'guild_id');
    }
}
