<?php

namespace App\Http\Controllers;

use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Player ranking
     */
    public function ranking()
    {
        $results = $this->getRankingQuery()->paginate(50);
        return view('ranking', [
            'players' => $results,
            'rank' => $results->firstItem()
        ]);
    }

    /**
     * Top player ranking
     */
    public function topPlayers()
    {
        return $this->getRankingQuery()->limit(5)->get();
    }

    /**
     * Get ranking query
     */
    private function getRankingQuery()
    {
        return Player::with(['guildMember.guild', 'playerIndex'])->orderBy('player.level', 'DESC')->orderBy('player.exp', 'DESC');
    }
}
