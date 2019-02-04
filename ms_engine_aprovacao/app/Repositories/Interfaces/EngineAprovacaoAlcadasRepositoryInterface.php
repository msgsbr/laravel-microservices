<?php
namespace App\Repositories\Interfaces;

/**
 * Controle de cadastro das alcadas de aprovacao no ERP.
 *
 * Interface para declarar os metodos do servico de controle de cadastro das alcadas de aprovacao no ERP.
 *
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 *
 * Class EngineAprovacaoAlcadasRepositoryInterface
 **/
interface EngineAprovacaoAlcadasRepositoryInterface
{

    /**
     * Retorna todos os registros
     * 
     * @param int $enterpriseId
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function readAll(int $enterpriseId);
    
    /**
     * Retorna o registro por ID
     * 
     * @param int $enterpriseId
     * @param string $alias
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function buscarAlcada(int $enterpriseId, string $alias="");
    
    /**
     * Adiciona um registro
     * 
     * @param array $alcada
     * @return array
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function salvar(array $alcada);

    /**
     * Verifica se o registro consultado ja existe
     * 
     * @param int $enterpriseId
     * @param $alcada
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function verificaRegistro(int $enterpriseId, array $alcada);

    /**
     * Verifica se o ID consultado ja existe
     * 
     * @param int $enterpriseId
     * @param int $id
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function verificaId(int $enterpriseId, int $id);
    
    /**
     * Atualiza o registro por ID
     * 
     * @param int $id
     * @param array $alcada
     * @return array
     * @throws \Beethoven\Repository\RepositoryException
     */
    public function atualizar(int $id, array $alcada);
    
    /**
     * Deleta um registro por ID
     * 
     * @param int $enterpriseId
     * @param int $id
     * @return array
     * @throws \Beethoven\Repository\RepositoryException
     **/
    function deletar(int $enterpriseId, int $id);
    
}