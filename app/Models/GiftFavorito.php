<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftFavorito extends Model
{
    protected $table = 'gift_favorito';

    protected $fillable = ['gif_id', 'alias', 'user_id'];
}
