<?php

namespace App\Http\Controllers;

use App\Models\Movimentacao;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;

class MovimentacoesController extends Controller
{
    
    public function save(Request $req) {
        $dados = $req->validate([
            'sku' => 'required',
            'quantidade' => 'required'
        ]);
        
        try {
            $movimentacao = new Movimentacao();
            $movimentacao->fill($dados);
            $movimentacao->save();
            return response()->json([
                'sucesso' => 'everything looks fine :D'
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'erro' => $e->getMessage()
            ], 500);
        }
    }

    public static function getMovimentacoes($sku){
        return Movimentacao::where('sku', $sku)->get();
    }

    public static function getTotalMovimentacoes($sku) {
        $movimentacoes = self::getMovimentacoes($sku);
        $total = 0;
        foreach  ($movimentacoes as $movimentacao) {
            $total += $movimentacao->quantidade;
        }
        return $total;
    }

}
