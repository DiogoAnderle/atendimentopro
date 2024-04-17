<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    use HasFactory;
    protected $table = 'responsaveis';
    protected $dates = ['dataNascimento'];

    protected $fillable = [
        'firstName',
        'lastName',
        'dataNascimento',
        'email',
        'telefone',
        'whatsapp',
        'cargo',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function clientes()
    {
        return $this->belongstoMany('App\Models\Cliente', 'responsavel_clientes')->withPivot('id');
    }
}
