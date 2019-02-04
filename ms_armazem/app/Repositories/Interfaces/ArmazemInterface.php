<?php

namespace App\Repositories\Interfaces;

/**
 * Interface ArmazemInterface
 * @package App\Repositories\Interfaces
 */
interface ArmazemInterface
{
    /**
     * @param 
     * @return array
     */
    public function readAll();
    
    /**
     * @param int $id
     * @return mixed
     */
    public function buscarPorId(int $id);
    
    /**
     * @param int $id | $data
     * @return array|string
     */
    public function atualizar(int $id, $data);
    
    /**
     * @param int $id
     * @return mixed
     */
    public function excluir(int $id);
    
    /**
     * @param $data
     * @return mixed
     */
    public function duplicate_validation($data);
    

    
}