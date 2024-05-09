<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraFornecedor extends Model
{
    use HasFactory;

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'compra_fornecedor_produto', 'compra_fornecedor_id', 'produto_id')
            ->withPivot('quantidade', 'valor_unitario');
    }
}
