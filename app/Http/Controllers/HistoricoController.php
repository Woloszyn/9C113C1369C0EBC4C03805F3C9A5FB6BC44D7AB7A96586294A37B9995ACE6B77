<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    public function find(Request $req) {
        $dados = $req->validate(['sku' => 'required']);
        $movimentacoes = MovimentacoesController::getMovimentacoes($dados['sku']);
        if ($movimentacoes) {
            $retorno = [];
            foreach($movimentacoes as $movimentacao) {
                $retorno[] = [
                    'sku' => $movimentacao->sku,
                    'movimentacao' => $movimentacao->quantidade
                ];
            }
            return response()->json(['movimentacoes' => $retorno]);
        }
        return response(['erro' => 'não foram encontradas movimentacoes'], 500);
    }
}
