<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores'; // Nome correto da tabela no banco de dados

    protected $fillable = [
        'razaoSocial',
        'cnpj',
        'email',
        'telefone',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'complemento',
        'descricao',
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
