<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;

class ProdutoController extends Controller {
    
    public function index(Request $req) {
        $dbProdutos = Produto::get();
        $Produtos = [];
        foreach($dbProdutos as $produto) {
            $totalQuantidade = MovimentacoesController::getTotalMovimentacoes($produto->sku);
            $Produtos[] = [
                'nome' => $produto->nome,
                'sku' => $produto->sku,
                'quantidade_inicial' => $produto->quantidade_inicial,
                'quantidade_atual' => ($produto->quantidade_inicial + $totalQuantidade)
            ];
        }
        return view('cadastro_produto', [
            'json_produtos' => json_encode($Produtos)
        ]);
    }

    public function save(Request $req) {
        $dados = $req->validate([
            'nome' => 'required',
            'sku' => 'required',
            'quantidade_inicial' => 'required'
        ]);

        try {
            $produto = new Produto();
            $produto->fill($dados);
            $produto->save();
            return response()->json([
                'success' => true
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

}