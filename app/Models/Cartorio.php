<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartorio extends Model
{
    protected $fillable = ['nome','razao','documento','cep','endereco','bairro','cidade','uf','telefone','email','tabeliao','ativo'];
    
    public function ativar()
    {
        return $this->update(['ativo' => true]);
    }

    public function desativar()
    {
        return $this->update(['ativo' => false]);
    }
}
