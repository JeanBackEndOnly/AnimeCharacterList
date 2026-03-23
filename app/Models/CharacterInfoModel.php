<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacterInfoModel extends Model
{
    protected $table = 'character_info';
    protected $fillable = [
        'name',
        'anime',
        'goals',
        'about',
        'icon',
    ];
}
