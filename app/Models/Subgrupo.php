<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subgrupo extends Model
{
    use HasFactory;
    protected $table = 'subgrupos';
    protected $fillable = [
        'nome',
        'grupo_id',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function grupo(){
        return $this->belongsTo('App\Models\Grupo');
    }

}
