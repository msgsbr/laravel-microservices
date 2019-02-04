<?php
namespace App\Repositories;

use App\Models\EngineAprovacaoProcessos;
use App\Repositories\Interfaces\EngineAprovacaoProcessosRepositoryInterface;
use Beethoven\Repository\Repository;

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
 * Class EngineAprovacaoProcessosRepository
 * @package Beethoven\Repository\Repository
 **/
class EngineAprovacaoProcessosRepository extends Repository implements EngineAprovacaoProcessosRepositoryInterface
{

    /**
     * Array com os campos (colunas) a serem consultados na tabela
     **/
    protected $fields = Array(
                                'PROCESSOS',
                                'PROCESSOS_DESC',
                                'PROCESSOS_METODO_VALOR'
                        );

    /**
     * EngineAprovacaoProcessosRepository constructor.
     * 
     * @param EngineAprovacaoProcessos $model
     **/
    public function __construct(EngineAprovacaoProcessos $model)
    {
        
        parent::__construct($model);
        
    }

    /**
     * Retorna todos os registros
     * 
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function readAll()
    {
        
        return $this->columns($this->fields)->paginate(10);
        
    }

}