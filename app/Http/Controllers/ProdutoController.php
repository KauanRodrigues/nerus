<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function create()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.mercadolibre.com/sites/MLB/categories");
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $categorias = curl_exec($ch);
        $dados['categorias'] = json_decode($categorias);

        curl_close($ch);

        return view('cadastro.produto')->with($dados);
    }

    public function store(Request $request)
    {
        $dados['nome'] = trim($request->nome);
        $dados['descricao'] = trim($request->descricao);
        $dados['categoria'] = $request->categoria;
        $dados['preco'] = $request->preco;
        $dados['kit'] = $request->kit;

        $curl_options = array(
        CURLOPT_URL => "http://localhost:8001/api/produto",
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query( $dados ),
        CURLOPT_HTTP_VERSION => 1.0,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false
        );

        $ch = curl_init();
        curl_setopt_array( $ch, $curl_options );
        $response = curl_exec( $ch );
        curl_close($ch);

        echo json_encode(true);
    }

    public function deletar(Request $request)
    {
        $dados['id'] = $request->id;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8001/api/produto/deletar");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dados));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_exec($ch);
        curl_close($ch);

        echo json_encode(true);
    }
}
