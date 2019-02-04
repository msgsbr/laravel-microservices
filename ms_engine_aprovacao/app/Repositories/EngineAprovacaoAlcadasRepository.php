<?php
namespace App\Repositories;

use App\Models\EngineAprovacaoAlcadas;
use App\Repositories\Interfaces\EngineAprovacaoAlcadasRepositoryInterface;
use Beethoven\Repository\Repository;

/**
 * Controle de cadastro das alcadas de aprovacao no ERP.
 *
 * Realiza o CRUD (criar, ler, editar, deletar) do cadastro das alcadas de aprovacao no ERP.
 *
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 *
 * Class EngineAprovacaoAlcadasRepository
 * @package Beethoven\Repository\Repository
 **/
class EngineAprovacaoAlcadasRepository extends Repository implements EngineAprovacaoAlcadasRepositoryInterface
{
    /**
     * Array com os campos (colunas) a serem consultados na tabela
     **/
    protected $fields = Array(
                                'id',
                                'alias',
                                'alcadas',
                                'ativo',
                                'fluxo_completo',
                                'criterio_menor',
                                'OrcAlteraAprovado'
                        );

    /**
     * EngineAprovacaoAlcadasRepository constructor
     * 
     * @param EngineAprovacaoAlcadas $model
     **/
    public function __construct(EngineAprovacaoAlcadas $model)
    {       
        parent::__construct($model);   
    }

    /**
     * Retorna todos os registros
     * 
     * @param int $enterpriseId
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function readAll(int $enterpriseId)
    {        
        $result = $this->where("id_ea1", "=", $enterpriseId)->columns($this->fields)->paginate(10);
        return $result;
    }

    /**
     * Retorna um registro especifico por ID
     * 
     * @param int $enterpriseId
     * @param string $alias
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function buscarAlcada(int $enterpriseId, string $alias="")
    {       
        $result =  $this->columns($this->fields)->where("id_ea1", "=", $enterpriseId)->where("alias", "=", $alias)->get();
        return $result;
    }

    /**
     * Adiciona um registro
     * 
     * @param array $alcada
     * @return array
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function salvar(array $alcada)
    {   
        $result = $this->add($alcada)->only($this->fields);
        return $result;
    }

    /**
     * Atualiza o registro por ID
     * 
     * @param int $id
     * @param array $alcada
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function atualizar(int $id, array $alcada)
    {            
        $result = $this->updateOneById($id, $alcada);
        return $result;
    }

    /**
     * Deleta um registro por ID
     * 
     * @param int $enterpriseId
     * @param int $id
     * @return array
     * @throws \Beethoven\Repository\RepositoryException
     **/
    function deletar(int $enterpriseId, int $id)
    {
        $result = $this->where("id_ea1", "=", $enterpriseId)->where("id", "=", $id)->delete();
        return $result;
    }
    
    /**
     * Verifica se o registro consultado ja existe
     * 
     * @param int $enterpriseId
     * @param $alcada
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function verificaRegistro(int $enterpriseId, array $alcada)
    {     
        $result = $this->columns($this->fields)->where("id_ea1", "=", $enterpriseId)->where("alias", "=", $alcada['alias'])->get();
        return $result;
    }

    /**
     * Verifica se o ID consultado ja existe
     * 
     * @param int $enterpriseId
     * @param int $id
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function verificaId(int $enterpriseId, int $id)
    {
        $result = $this->columns($this->fields)->where("id_ea1", "=", $enterpriseId)->where("id", "=", $id)->get();
        return $result;
    }
    
}