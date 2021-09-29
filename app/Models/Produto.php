<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model{

    protected $table = 'produtos';

    protected $primaryKey = 'sku';

    public $incrementing = false;

    protected $fillable = [ 'nome', 'sku', 'quantidade_inicial'];

    public $timestamps = false;


}