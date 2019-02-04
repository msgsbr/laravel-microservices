<?php
namespace App\Http\Controllers;

use App\Http\Rules\EngineAprovacaoAlcadasRules;
use App\Services\EngineAprovacaoAlcadasService;
use Beethoven\Routing\Controller;
use Beethoven\Common\Beethoven;

/**
 * Controle de cadastro das alcadas de aprovacao no ERP.
 *
 * Realiza o CRUD (criar, ler, editar, deletar) do cadastro das alcadas de aprovacao no ERP.
 *
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 *
 * Class EngineAprovacaoAlcadasController
 * @package Beethoven\Routing\Controller
 **/
class EngineAprovacaoAlcadasController extends Controller
{
    /**
     * Cria as regras de aprovacao
     * 
     * @return string nome do arquivo de configuração Rules
     */
    static function getRules()
    {
        return new EngineAprovacaoAlcadasRules();
    }
    /**
     * Retorna todos os registros
     * 
     * @param \App\Services\EngineAprovacaoAlcadasService           $service
     * @return mixed
     */
    public function getAll(EngineAprovacaoAlcadasService $service)
    {
        $service = $service->buscarTodos();
        return $this->request->response($service);
    }

    /**
     * Retorna o registro por ID
     * 
     * @param \App\Services\EngineAprovacaoAlcadasService           $service
     * @param                                                       int $id
     * @return mixed
     */
    public function get(EngineAprovacaoAlcadasService $service, $id)
    {
        $service = $service->buscarAlcada($id);
        return $this->request->response($service);
    }

    /**
     * Adiciona um registro
     * 
     * @param \App\Services\EngineAprovacaoAlcadasService           $service
     * @return mixed
     */
    public function post(EngineAprovacaoAlcadasService $service)
    {
        $service = $service->gravarAlcada(Beethoven::request()->dataInput()->getAll());
        return $this->request->response($service);
    }

    /**
     * Atualiza o registro por ID
     * 
     * @param \App\Services\EngineAprovacaoAlcadasService            $service
     * @param                                                        int $id
     * @return mixed
     */
    public function put(EngineAprovacaoAlcadasService $service, $id)
    {
        $service = $service->atualizarAlcada($id, Beethoven::request()->dataInput()->getAll());
        return $this->request->response($service);
    }

    /**
     * Deleta um registro por ID
     * 
     * @param \App\Services\EngineAprovacaoAlcadasService               $service
     * @param                                                           int $id
     * @return mixed
     */
    public function delete(EngineAprovacaoAlcadasService $service, $id)
    {
        $service = $service->deletarAlcada($id);
        return $this->request->response($service);
    }

}