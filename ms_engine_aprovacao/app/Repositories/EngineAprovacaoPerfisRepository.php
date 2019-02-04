<?php
namespace App\Repositories;

use App\Models\EngineAprovacaoPerfis;
use App\Repositories\Interfaces\EngineAprovacaoPerfisRepositoryInterface;
use Beethoven\Repository\Repository;

/**
 * Controle dos Perfis disponiveis para uso no cadastro da alcadas de aprovacao no ERP.
 *
 * Realiza a leitura dos Perfis disponiveis para uso no cadastro da alcadas de aprovacao no ERP.
 *
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 *
 * Class EngineAprovacaoPerfisRepository
 * @package Beethoven\Repository\Repository
 **/
class EngineAprovacaoPerfisRepository extends Repository implements EngineAprovacaoPerfisRepositoryInterface
{

    /**
     * Array com os campos (colunas) a serem consultados na tabela
     **/
    protected $fields = Array(
                                'MN2_ID',
                                'MN2_Desc',
                                'MN2_Admin',
                                'MN2_CRIADOR',
                                'MN2_ALTERADOR',
                                'MN2_STATUS',
                                'MN2_Nivel'
                        );
 
    /**
     * EngineAprovacaoPerfisRepository constructor.
     * 
     * @param EngineAprovacaoPerfis $model
     **/
    public function __construct(EngineAprovacaoPerfis $model)
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