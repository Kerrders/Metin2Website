<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use Cachable;

    protected $cacheCooldownSeconds = 60*10; // 10 minutes cache
}
