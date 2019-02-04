<?php
namespace App\Http\Controllers;

use App\Services\CaixaProdutoService;
use Beethoven\Http\Request;
use Beethoven\Routing\Controller;
use App\Http\Requests\CaixaProdutoRequestAll;
use App\Http\Requests\CaixaProdutoRequestGet;
use App\Http\Requests\CaixaProdutoRequestPut;
use App\Http\Requests\CaixaProdutoRequestPost;
use App\Http\Requests\CaixaProdutoRequestDelete;

/**
 *
 * @author aline freire
 *        
 */
class CaixaProdutoController extends Controller
{

    public function all(CaixaProdutoService $service, CaixaProdutoRequestAll $request)
    {
        $service = $service->buscarTodos();
        return $request->response($service);
    }

    public function get(CaixaProdutoRequestGet $request, $id, CaixaProdutoService $service)
    {
        $service = $service->buscarPorId($id);
        return $request->response($service);
    }

    public function post(CaixaProdutoRequestPost $request, CaixaProdutoService $service)
    {
        $response = $service->incluirProdutosNaCaixa($request->getBody()
            ->toArray());
        return $request->response($response);
    }

    public function put(CaixaProdutoRequestPut $request, $id, CaixaProdutoService $service)
    {
        $response = $service->atualizarProdutosDestaCaixa($id, $request->getBody()
            ->toArray());
        return $request->response($response);
    }

    public function delete(CaixaProdutoRequestDelete $request, $id, CaixaProdutoService $service)
    {
        $response = $service->deletarProdutoDaCaixa($id);
        return $request->response($response);
    }
}