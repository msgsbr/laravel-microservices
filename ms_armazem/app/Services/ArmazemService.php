<?php

namespace App\Services;

use App\Repositories\ArmazemRepository;
use App\Services\Interfaces\ArmazemServiceInterface;
use Beethoven\Common\Beethoven;
use Beethoven\Service\Service;
use Beethoven\Http\Request;
use Beethoven\Collection;
use PHPUnit\Runner\Exception;
use function GuzzleHttp\json_encode;

/**
 * Class Armazem
 * @package App\Services
 */
class ArmazemService extends Service implements ArmazemServiceInterface
{
    private $armazemRepository;
    public  $SBW_ID;
    public  $SBW_Desc;
    public  $SBW_DisponivelVenda;
  

    public function __construct(ArmazemRepository $armazemRepository)
    {
        $this->armazemRepository = $armazemRepository;
    }

    /**
     * @return mixed
     */
    public function read()
    {
        $response = $this->armazemRepository->readAll();
        return $response;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findOneById(int $id)
    {
        $valida_id  = $this->valida_id_existente($id);
      
        if (empty($valida_id))
            abort(200, "Nenhum registro com id ".$id." encontrado!"); 
       
        $response = $this->armazemRepository->buscarPorId($id);
        return $response;
    }
    
    /**
     * @param array $data
     * @return array
     */
    public function criarArmazem($data){
        
        $service = $this->setterDynamic($this, $data);
        
        $armazem =  Array(
            'SBW_Desc' => $service->SBW_Desc,
            'SBW_DisponivelVenda' => $service->SBW_DisponivelVenda,
            'SBW_IDEA1'     => Beethoven::getEnterpriseId());

        return $armazem;
    }
    
    /**
     * @param $data
     * @return array|string
     */
    public function addArmazem($data){
    
       try{
            $armazem          = $this->criarArmazem($data);
            $armazem['SBW_CRIADOR']  = Beethoven::getUserId();
            
            $validaDuplicado =  $this->valida_duplicado($data);
           
                if(!$validaDuplicado['success'])
                {
                    abort(200,$validaDuplicado['message']);
                }
                
            $resultArmazem = $this->armazemRepository->salvar($armazem);
              
            return $resultArmazem;
             }
             catch(Exception $e){

                 return $e->getMessage();
            }
    }

    /**
     * @param $data
     * @return array|string
     */
    public function putArmazem($id, $data){
       
        try{
            $valida_id  = $this->valida_id_existente($id);
            if (empty($valida_id))
               abort(200, "Nenhum registro com id ".$id." encontrado para alterar!"); 
        
            $armazem  = $this->criarArmazem($data);
            $armazem['SBW_ALTERADOR'] = Beethoven::getUserId();
            
            $result = $this->armazemRepository->atualizar($id,$armazem);
           
            if($result)
            return Array("STATUS" => "Registro id ".$id." atualizado com sucesso!");
        }catch(Exception $e){

            return $e->getMessage();
        }
    }
    
    /***
     * @param int $id
     * @return mixed
     */
    public function removeArmazem($id)
    {
        
        $valida_id  = $this->valida_id_existente($id);
        
       
        if (empty($valida_id))
            abort(200, "Nenhum registro com id ".$id." encontrado para deletar!"); 
        $response = $this->armazemRepository->excluir($id);
        if($response)
        return Array("Registro excluído com sucesso id" .$id);
        
          }

   
    
    /**
     * @param array $data
     * @return array
     */
    public function valida_duplicado($data)
    {
        $duplicate = $this->armazemRepository->duplicate_validation($data);
        
        if(!$duplicate)
        {
            $result['success'] = true;
            $result['message'] = utf8_encode('Ainda não existe');
        }
        else
        {
            $result["success"] = false;
            $result["message"] = utf8_encode("Já existe um armazém com essa descrição");
        }
        
        return $result;
    }
    
    public function valida_id_existente(int $id)
    {
      
        $id_existente = $this->armazemRepository->valida_id($id);
   
        return $id_existente;
        
    }
    
    
    /**
     * @param int $id
     * @return int
     */
    public function SBW_ID(int $SBW_ID)
    {
        $this->SBW_ID = $SBW_ID;
    }
    
    /**
     * @param string $SBW_Desc
     * @return string
     */
    public function SBW_Desc(string $SBW_Desc)
    {
        $this->SBW_Desc = $SBW_Desc;
    }
    
    /**
     * @param string $SBW_DisponivelVenda
     * @return string
     */
    public function SBW_DisponivelVenda(string $SBW_DisponivelVenda)
    {
        $this->SBW_DisponivelVenda = $SBW_DisponivelVenda;
    }
}