<?php
namespace App\Http\Controllers;

use App\Services\EngineAprovacaoPerfisService;
use Beethoven\Routing\Controller;
use App\Http\Rules\EngineAprovacaoPerfisRules;

/**
 * Controle dos Perfis disponiveis para uso no cadastro da alcadas de aprovacao no ERP.
 *
 * Realiza a leitura dos Perfis disponiveis para uso no cadastro da alcadas de aprovacao no ERP.
 *
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 *
 * Class EngineAprovacaoPerfisController
 * @package Beethoven\Routing\Controller
 **/
class EngineAprovacaoPerfisController extends Controller
{
    /**
     * Cria as regras de aprovacao
     * 
     * @return string nome do arquivo de configuração Rules
     */
    static function getRules()
    {
        return new EngineAprovacaoPerfisRules();
    }
    
    /**
     * Retorna todos os registros
     * 
     * @param \App\Services\EngineAprovacaoPerfisService         $service
     * @return mixed
     * 
     */
    public function getAll(EngineAprovacaoPerfisService $service)
    {
        $service = $service->buscarTodos();
        return $this->request->response($service);
    }

    
    /**
     * Retorna um registro especifico por ID
     * 
     * @param \App\Services\EngineAprovacaoPerfisService         $service
     * @param                                                    $id
     * @return mixed
     */
    public function get(EngineAprovacaoPerfisService $service, $id )
    {
        $service = $service->buscarPorId($id);
        return $this->request->response($service);
    }
    
    /**
     * Cria um novo perfil
     * 
     * @param \App\Services\EngineAprovacaoPerfisService         $service
     * @return mixed
     */
    public function post(EngineAprovacaoPerfisService $service)
    {
        $caixa = $service->incluirPerfil();
        return $this->request->response($caixa);
    }
    
    /**
     * Atualiza um perfil
     * 
     * @param \App\Services\EngineAprovacaoPerfisService         $service
     * @param                                                    $id
     * @return mixed
     */
    public function put(EngineAprovacaoPerfisService $service, $id)
    {
        $response = $service->editarPerfil($id);
        return $this->request->response($response);
        
    }
    
    /**
     * Exclui um perfil
     * 
     * @param \App\Services\EngineAprovacaoPerfisService         $service
     * @param                                                    $id
     * @return mixed
     */
    public function delete(EngineAprovacaoPerfisService $service, $id)
    {
        $response = $service->deletarPerfil($id);
        return $this->request->response($response);
    }
    
}