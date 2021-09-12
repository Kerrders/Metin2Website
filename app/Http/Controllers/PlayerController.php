<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /** 
     * Player ranking
     */
    public function ranking()
    {
        return view('ranking', [
            'players' => Player::with(['guildMember.guild', 'playerIndex'])->orderBy('player.level', 'DESC')->orderBy('player.exp', 'DESC')->paginate(50)
        ]);
    }
}
