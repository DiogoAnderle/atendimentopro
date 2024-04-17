<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VersaoSistema extends Model
{
    use HasFactory;
    protected $casts = [
        'ultima_versao' => 'boolean',
    ];

    protected $table = 'versoes_sistema';
    protected $fillable = [
        'versao',
        'descricao',
        'user_id',
        'ultima_versao'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
