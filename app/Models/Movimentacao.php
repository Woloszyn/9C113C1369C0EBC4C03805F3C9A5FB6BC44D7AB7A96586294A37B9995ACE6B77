<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model {

    protected $table = 'movimentacoes';

    protected $primaryKey = 'id';

    protected $fillable = [ 'quantidade', 'sku', 'id'];

    public $timestamps = false;

    public function produto() :Produto {
        return $this->hasOne('App\Models\Produto', 'sku', 'sku')->first();
    }

}