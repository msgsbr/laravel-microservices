<?php
namespace App\Services;

use App\Repositories\EngineAprovacaoPerfisRepository;
use App\Services\Interfaces\EngineAprovacaoPerfisServiceInterface;
use Beethoven\Service\Service;

/**
 * Controle dos Perfis disponiveis para uso no cadastro da alcadas de aprovacao no ERP.
 *
 * Realiza a leitura dos Perfis disponiveis para uso no cadastro da alcadas de aprovacao no ERP.
 *
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 *
 * Class EngineAprovacaoPerfisService
 * @package Beethoven\Service\Service
 **/
class EngineAprovacaoPerfisService extends Service implements EngineAprovacaoPerfisServiceInterface
{
    
    /**
     * Variavel privada que recebe a Classe EngineAprovacaoPerfisRepository
     **/
    private $engineAprovacaoPerfisRepository;

    /**
     * EngineAprovacaoPerfisService constructor.
     *
     * @param EngineAprovacaoPerfisRepository $engineAprovacaoPerfisRepository
     **/
    public function __construct(EngineAprovacaoPerfisRepository $engineAprovacaoPerfisRepository)
    {
        
        $this->engineAprovacaoPerfisRepository = $engineAprovacaoPerfisRepository;
        
    }

    /**
     * Retorna todos os registros
     *
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     **/
    public function buscarTodos()
    {
        
        $response = $this->engineAprovacaoPerfisRepository->readAll();       
        return $response;
        
    }

}