<?php
namespace App\Http\Controllers;

use App\Http\Requests\CalculoAlocateRequestAdd;
use App\Http\Requests\CalculoAlocateRequestPut;
use App\Services\CalculoAlocateService;
use Beethoven\Http\Request;
use Beethoven\Routing\Controller;

/**
 *
 * @author aline freire
 *        
 */
class CalculoAlocateController extends Controller
{

    /**
     *
     * @param Request $request
     * @param
     *            $id
     * @param CalculoAlocateService $service
     * @return mixed
     */
    public function put(CalculoAlocateRequestPut $request, $id, CalculoAlocateService $service)
    {
        $response = $service->calcularAlocacaoDeItens($request->getBody()
            ->toArray());
        
        return $request->response($response);
    }

    /**
     *
     * @param CalculoAlocateRequestAdd $request
     * @param CalculoAlocateService $service
     * @return mixed
     */
    public function add(CalculoAlocateRequestAdd $request, CalculoAlocateService $service)
    {
        $response = $service->calcularAlocacaoDeItens($request->getBody()
            ->toArray());
        
        return $request->response($response);
    }
}