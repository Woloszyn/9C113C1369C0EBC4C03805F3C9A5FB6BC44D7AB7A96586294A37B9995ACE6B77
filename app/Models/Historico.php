<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model {

    protected $table = 'historico_movimentacoes';

    protected $primaryKey = 'id';

    protected $fillable = [ 'id', 'movimentacoes'];

    public $timestamps = false;

}