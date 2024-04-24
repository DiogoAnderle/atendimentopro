<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';
    protected $casts = [
        'produtos_cliente' => 'array',
    ];

    protected $fillable = [
        'usuario_banco',
        'quantidade_fatura',
        'quantidade_financeiro',
        'quantidade_importacao',
        'quantidade_exportacao',
        'total_licencas',
        'estacoes_liberadas',
        'zeus',
        'status',
        'versao_sistema_id',
        'tipo_licenca',
        'tipo_acesso',
        'endereco_acesso',
        'porta_acesso',
        'usuario_acesso',
        'senha_acesso',
        'senha_aberta',
        'caminho_atualiza',
        'caminho_banco',
        'caminho_executavel',
        'caminho_backup',
        'caminho_interno',
        'endereco_zeus',
        'endereco_tzion',
        'produtos_cliente',
        'parametrizacao',
        'gerador',
        'observacoes',
        'cliente_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function versao_sistema()
    {
        return $this->belongsTo('App\Models\VersaoSistema');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
