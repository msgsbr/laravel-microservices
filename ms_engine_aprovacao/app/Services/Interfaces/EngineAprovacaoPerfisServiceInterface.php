<?php
namespace App\Services\Interfaces;

/**
 * Controle dos Perfis disponiveis para uso no cadastro da alcadas de aprovacao no ERP.
 *
 * Interface para declarar os metodos do servico de controle dos Perfis disponiveis para uso no cadastro da alcadas de aprovacao no ERP.
 *
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 *
 * Class EngineAprovacaoPerfisServiceInterface
 **/
interface EngineAprovacaoPerfisServiceInterface
{

    /**
     * Retorna todos os registros
     *
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function buscarTodos();

}