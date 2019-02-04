<?php
namespace App\Http\Controllers;

use App\Services\EngineAprovacaoProcessosService;
use Beethoven\Routing\Controller;
use App\Http\Rules\EngineAprovacaoProcessosRules;
 
/**
 * Controle dos Tipos de Alcadas de aprovacao disponiveis para uso no ERP.
 *
 * Realiza a leitura dos Tipos de Alcadas de aprovacao disponiveis para uso no ERP*.
 * *Hoje, nao existe tabela para cadastro e uso desse servico, porem a estrutura ja foi desenvolvida para futuras implementacoes.
 *
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 *
 * Class EngineAprovacaoProcessosController
 * @package Beethoven\Routing\Controller
 **/
class EngineAprovacaoProcessosController extends Controller
{
    /**
     * Cria as regras de aprovacao
     * 
     * @return string nome do arquivo de configuração Rules
     */
    static function getRules()
    {
        return new EngineAprovacaoProcessosRules();
    }
    
    /**
     * Retorna todos os registros.
     * Hoje nao existe tabela e processo de cadastro para uso desse servico, porem a estrutura esta definida para futuras implementacoes. 
     * 
     * @param \App\Services\EngineAprovacaoProcessosService         $service
     * @return mixed
     */
    public function getAll(EngineAprovacaoProcessosService $service)
    { 
        $service = $service->buscarTodos();
        //return $this->request->response($service);
        return $service;
    }
    
    /**
     * Retorna um registro especifico por ID
     * 
     * @param \App\Services\EngineAprovacaoProcessosService         $service
     * @param                                                       $id
     * @return mixed
     */
    public function get(EngineAprovacaoProcessosService $service, $id )
    {
        $service = $service->buscarPorId($id);
        return $this->request->response($service);
    }
    
    /**
     * Cria em novo processo
     * 
     * @param \App\Services\EngineAprovacaoProcessosService         $service
     * @return mixed
     */
    public function post(EngineAprovacaoProcessosService $service)
    {
        $caixa = $service->incluirProcessos();
        return $this->request->response($caixa);
    }
    
    /**
     * Atualiza um processo ja criado
     * 
     * @param \App\Services\EngineAprovacaoProcessosService         $service
     * @param                                                       $id
     * @return mixed
     */
    public function put(EngineAprovacaoProcessosService $service, $id)
    {
        $response = $service->editarProcessos($id);
        return $this->request->response($response);
        
    }
    
    /**
     * Exclui um projeto
     * 
     * @param \App\Services\EngineAprovacaoProcessosService         $service
     * @param                                                       $id
     * @return mixed
     */
    public function delete(EngineAprovacaoProcessosService $service, $id)
    {
        $response = $service->deletarProcessos($id);
        return $this->request->response($response);
    }
    
}