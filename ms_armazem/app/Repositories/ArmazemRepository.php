<?php

namespace App\Repositories;

use App\Models\Armazem;
use App\Repositories\Interfaces\ArmazemInterface;
use App\Services\ArmazemService;
use Beethoven\Database\Db\SharedEnterprise;
use Beethoven\Database\Orm\Model;
use Beethoven\Repository\Repository;
use Beethoven\Service\Service;
use Beethoven\Common\Beethoven;

/**
 * Class ArmazemRepository
 * @package App\Repositories
 */
class ArmazemRepository extends Repository implements ArmazemInterface
{
    protected $fields = Array(  
        'SBW_ID', 
        'SBW_Desc', 
        'SBW_DisponivelVenda',
        'SBW_IDEA1',
        'SBW_CRIADOR', 
        'SBW_ALTERADOR'
        );
    /**
     *
     * @param Armazem $model
     */
    public function __construct(Armazem $model)
    {
        parent::__construct($model);
    }

    /**
     * @param ArmazemRepository $armazemRepository
     * @return $this
     * @throws \Beethoven\Repository\RepositoryException
     */
    public function readAll()
    {
       return $this->columns($this->fields)->paginate(10);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     */
    public function buscarPorId(int $id)
    {
        return $this->where('SBW_ID', '=', $id)->get($this->fields);
    }
    
   /**
    * @param $armazem
    * @return array
    * @throws \Beethoven\Repository\RepositoryException
    */
    public function salvar($armazem)
    {
        $result = $this->add($armazem)->only($this->fields);
        return $result;
    }
    
    /**
     * 
     * @param int $id
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     */
    public function atualizar(int $id, $armazem)
    {
        $result = $this->updateOneById($id,$armazem);
        return $result;
    }
    
    /**
     * @param int $id
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     */
    public function excluir(int $id)
    {
       //Comentado até que se resolva se o delete terá ou não o IDEA1 por padrão
      //  if ($this->allExist($id)) {
         $result =   $this->where("SBW_IDEA1", "=", Beethoven::getEnterpriseId())->where("SBW_ID","=",$id)->delete(); 
         return $result;
      // } 
    }
    /**
     * @param int $array
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     */
    public function duplicate_validation($armazem)
    {
        $result = array();
        $result = $this->columns($this->fields)
                          ->where('SBW_Desc','=', $armazem['SBW_Desc'])
                          ->where('SBW_IDEA1','=', Beethoven::getEnterpriseId())
                          ->get($this->fields);
      
       
       return $result;
    }
    
    public function valida_id(int $id)
    {
        $result = array();
        $result = $this->columns($this->fields)->where('SBW_ID', '=', $id)->get($this->fields);
        
        
        return $result;
    }
}
