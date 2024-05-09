<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'enderecos';
    
    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function fornecedor()
    {
        return $this->hasOne(Fornecedor::class);
    }

    public function funcionario()
    {
        return $this->hasOne(Funcionario::class);
    }

    
}
