<?php

namespace App\Services\Interfaces;
use Zend\Stdlib\Request;


/**
 * Interface ArmazemServiceInterface
 * @package App\Repositories\Interfaces
 */
interface ArmazemServiceInterface{

    /**
     * @param int $id
     * @return int
     */
    public function SBW_ID(int $SBW_ID);
   
    /**
     * @param string $SBW_Desc
     * @return string
     */
    public function SBW_Desc(string $SBW_Desc);
    
    /**
     * @param string $SBW_DisponivelVenda
     * @return string
     */
    public function SBW_DisponivelVenda(string $SBW_DisponivelVenda);

    /**
     * @return mixed
     */
    public function read();

    /**
     * @param int $id
     * @return mixed
     */
    public function findOneById(int $id);
    
    /**
     * @param array $data
     * @return mixed
     */
    public function criarArmazem($data);
    
    /**
     * @param array $data
     * @return mixed
     */
    public function valida_duplicado($data);

}