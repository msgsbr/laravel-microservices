<?php
namespace App\Services\Interfaces;

/**
 * Controle de cadastro das alcadas de aprovacao no ERP.
 *
 * Interface para declarar os metodos do servico de controle de cadastro das alcadas de aprovacao no ERP.
 *
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 *
 * Class EngineAprovacaoAlcadasServiceInterface
 **/
interface EngineAprovacaoAlcadasServiceInterface{
    
    /**
     * Retorna todos os registros
     * 
     * @return mixed
     **/
    public function buscarTodos();

    /**
     * Retorna o registro por ID
     * 
     * @param int $id
     * @return mixed
     **/
    public function buscarAlcada(int $id);

    /**
     * Adiciona um registro
     * 
     * @param array $alcada
     * @return array
     **/
    public function gravarAlcada(array $alcada);

    /**
     * Verifica se o registro consultado ja existe
     * 
     * @param array $alcada
     * @return mixed
     **/
    public function verificaRegistro(array $alcada);

    /**
     * Verifica se o ID consultado ja existe
     * 
     * @param int $id
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function verificaId(int $id);
    
    /**
     * Atualiza o registro por ID
     * 
     * @param int $id
     * @param array $alcada
     * @return array
     **/
    public function atualizarAlcada(int $id, array $alcada);
    
    /**
     * Deleta um registro por ID
     * 
     * @param int $id
     * @return mixed
     **/
    public function deletarAlcada(int $id);  
    
}