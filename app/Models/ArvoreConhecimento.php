<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArvoreConhecimento extends Model
{
    use HasFactory;
    protected $table = 'arvore_conhecimentos';
    protected $fillable = [
        'assunto',
        'grupo_id',
        'subgrupo_id',
        'user_id',
        'descricao',
        'image',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function grupo(){
        return $this->belongsTo('App\Models\Grupo');
    }

     public function subgrupo(){
        return $this->belongsTo('App\Models\Subgrupo');
    }
}
