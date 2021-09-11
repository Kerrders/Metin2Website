<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function __construct()
    {
    }

    /** 
     * Player ranking
     */
    public function ranking()
    {
        return view('ranking', [

        ]);
    }
}
