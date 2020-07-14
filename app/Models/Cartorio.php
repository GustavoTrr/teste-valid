<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartorio extends Model
{
    protected $fillable = ['nome','razao','documento','cep','endereco','bairro','cidade','uf','telefone','email','tabeliao','ativo'];
    
    /**
     * Altera o status do Cartório para "ativo"
     *
     * @return boolean
     */
    public function ativar()
    {
        return $this->update(['ativo' => true]);
    }

    /**
     * Altera o status do Cartório para "inativo"
     *
     * @return boolean
     */
    public function desativar()
    {
        return $this->update(['ativo' => false]);
    }
}
