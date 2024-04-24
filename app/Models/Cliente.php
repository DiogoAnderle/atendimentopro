<?php

namespace App\Models;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'cnpj',
        'razaoSocial',
        'nomeFantasia',
        'status',
        'telefone',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'ibge',
        'uf',
        'dataInicioAtividade',
        'dataInicioParceria',
        'user_id',
    ];
    protected $dates = [
        'dataInicioAtividade',
        'dataInicioParceria'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function responsaveis()
    {
        return $this->belongsToMany('App\Models\Responsavel', 'responsavel_clientes')->withPivot('id');
    }

    public function produto()
    {
        return $this->hasOne(Produto::class);
    }

}
