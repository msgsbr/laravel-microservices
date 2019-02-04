<?php
namespace App\Services;

use App\Repositories\EngineAprovacaoProcessosRepository;
use App\Services\Interfaces\EngineAprovacaoProcessosServiceInterface;
use Beethoven\Service\Service;

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
 * Class EngineAprovacaoProcessosService
 * @package Beethoven\Service\Service
 **/
class EngineAprovacaoProcessosService extends Service implements EngineAprovacaoProcessosServiceInterface
{

    /**
     * Variavel privada que recebe a Classe EngineAprovacaoProcessosRepository
     **/
    private $EngineAprovacaoProcessosRepository;

    /**
     * EngineAprovacaoProcessosService constructor.
     *
     * @param EngineAprovacaoProcessosRepository $EngineAprovacaoProcessosRepository
     **/
    public function __construct(EngineAprovacaoProcessosRepository $EngineAprovacaoProcessosRepository)
    {
        $this->EngineAprovacaoProcessosRepository = $EngineAprovacaoProcessosRepository;
    }

    /**
     * Retorna todos os registros
     *
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function buscarTodos()
    {
        
        //$response = $this->EngineAprovacaoProcessosRepository->readAll();     
        //return $response;       
        
        // nao existe tabela para consulta e retorno dessa informacao, porem o servico foi criado e preparado para uma futura implementacao
        $processos = array();
        $processos['data'][] = array("tipo" => "SC3", "descricao" => "Pedido de Compras", "metodo_valor" => "LePedidoCompra");
        $processos['data'][] = array("tipo" => "SC5", "descricao" => "Orçamento", "metodo_valor" => "LeOrcamento");
        
        $response = json_encode($processos);
        return $response;
        
    }

}