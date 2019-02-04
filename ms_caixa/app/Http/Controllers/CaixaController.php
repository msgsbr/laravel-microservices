<?php
namespace App\Http\Controllers;

use App\Services\CaixaService;
use Beethoven\Http\Request;
use Beethoven\Routing\Controller;
use App\Http\Rules\CaixaRules;


/**
 * Class CaixaController
 * @package App\Http\Controllers
 */
class CaixaController extends Controller
{
    
    /**
     *
     * @return string nome do arquivo de configuração Rules
     */
    static function getRules(){
        return new CaixaRules();
    }
    
    /**
     *
     * @param \App\Services\CaixaService $service
     * @param \App\Http\Requests\CaixaRequestAll $request
     * @return mixed
     */
    public function getAll(CaixaService $service)
    {
        $service = $service->buscarTodos();
        
        return $this->request->response($service);
    }
    
    /**
     * @param \App\Http\Requests\CaixaRequestGet $request
     * @param                                    $id
     * @param \App\Services\CaixaService         $service
     * @return mixed
     */
    public function get(CaixaService $service, $id )
    {
        $service = $service->buscarPorId($id);
        return $this->request->response($service);
    }
    
    /**
     * @param \App\Http\Requests\CaixaRequestAdd $request
     * @param \App\Services\CaixaService         $service
     * @return mixed
     */
    public function post(CaixaService $service)
    {
        $caixa = $service->incluirCaixa();
        return $this->request->response($caixa);
    }
    
    /**
     * @param \App\Http\Requests\CaixaRequestPut $request
     * @param                                    $id
     * @param \App\Services\CaixaService         $service
     * @return mixed
     */
    public function put( $id, CaixaService $service)
    {
        $response = $service->editarCaixa($id);
        return $this->request->response($response);
        
    }
    
    /**
     * @param \Beethoven\Http\Request    $request
     * @param                            $id
     * @param \App\Services\CaixaService $service
     * @return mixed
     */
    public function delete($id, CaixaService $service)
    {
        $response = $service->deletarCaixa($id);
        return $this->request->response($response);
    }
    
}