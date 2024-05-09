<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $dates = ['validade'];

    public function compras()
    {
        return $this->hasMany(CompraProdutos::class);
    }

    public function vendas()
    {
        return $this->hasMany(VendaProdutos::class);
    }

    public function estoque()
    {
        return $this->belongsTo(Estoque::class);
    }
    
}
