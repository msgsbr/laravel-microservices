<?php
namespace App\Repositories\Interfaces;

/**
 * Controle dos Tipos de Alcadas de aprovacao disponiveis para uso no ERP.
 *
 * Interface para declarar os metodos do servico dos Tipos de Alcadas de aprovacao disponiveis para uso no ERP*. 
 * *Hoje, nao existe tabela para cadastro e uso desse servico, porem a estrutura ja foi desenvolvida para futuras implementacoes.
 *
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 *
 * Class EngineAprovacaoProcessosRepositoryInterface
 **/
interface EngineAprovacaoProcessosRepositoryInterface
{

    /**
     * Retorna todos os registros
     * 
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function readAll();
    
}