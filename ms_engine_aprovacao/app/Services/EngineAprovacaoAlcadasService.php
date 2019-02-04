<?php
namespace App\Services;

use App\Repositories\EngineAprovacaoAlcadasRepository;
use App\Services\Interfaces\EngineAprovacaoAlcadasServiceInterface;
use Beethoven\Common\Beethoven;
use Beethoven\Service\Service;

/**
 * Controle de cadastro das alcadas de aprovacao no ERP.
 *
 * Realiza o CRUD (criar, ler, editar, deletar) do cadastro das alcadas de aprovacao no ERP.
 *
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 *
 * Class EngineAprovacaoAlcadasService
 * @package Beethoven\Service\Service
 **/
class EngineAprovacaoAlcadasService extends Service implements EngineAprovacaoAlcadasServiceInterface
{

    /**
     * Variavel privada que recebe a Classe EngineAprovacaoAlcadasRepository
     **/
    private $engineAprovacaoAlcadasRepository;

    /**
     * EngineAprovacaoAlcadasService constructor
     *
     * @param EngineAprovacaoAlcadasRepository $engineAprovacaoAlcadasRepository
     **/
    public function __construct(EngineAprovacaoAlcadasRepository $engineAprovacaoAlcadasRepository)
    {       
        $this->engineAprovacaoAlcadasRepository = $engineAprovacaoAlcadasRepository;      
    }

    /**
     * Retorna todos os registros
     * 
     * @return mixed
     **/
    public function buscarTodos()
    {      
        $response = $this->engineAprovacaoAlcadasRepository->readAll(Beethoven::getEnterpriseId());       
        return $response;        
    }

    /**
     * Retorna o registro por ID
     * 
     * @param int $id
     * @return mixed
     **/
    public function buscarAlcada(int $id)
    {
        if ($id != 3 && $id != 5)
            abort(404, "Nenhum registro id# ".$id." encontrado");  
        
        // foi criado essa parametrizacao porque a consulta por ID na requisicao so pode ser realizada por numeros
        if ($id === 3) $alias = "SC3";
        if ($id === 5) $alias = "SC5";
        $response = $this->engineAprovacaoAlcadasRepository->buscarAlcada(Beethoven::getEnterpriseId(), $alias);
        return $response;       
    }

    /**
     * Adiciona um registro
     * 
     * @param array $alcada
     * @return array
     **/
    public function gravarAlcada(array $alcada)
    {    
        $alias = false;
        // foi criado essa parametrizacao porque a criacao da alcada vale apenas para SC3 ou SC5
        if ($alcada['alias'] === "SC3") $alias = true;
        if ($alcada['alias'] === "SC5") $alias = true;
        
        if(! $alias)
            abort(400, "Nao foi possivel realizar o cadastro, verifique os dados enviados!"); 
        
        $verificaRegistro = $this->verificaRegistro($alcada);        
        if (isset($verificaRegistro['alias']) && $verificaRegistro['alias'] === $alcada['alias'])
            abort(409, "Ja existe um cadastro para este cliente. Registro id# ".$verificaRegistro['id']);    

        $attributes = array("id_ea1" => Beethoven::getEnterpriseId());
        $alcada = array_merge($alcada, $attributes); 
        $result = $this->engineAprovacaoAlcadasRepository->salvar($alcada);
        return Array("id_return" => $result);       
    }

    /**
     * Atualiza o registro por ID
     * 
     * @param int $id
     * @param array $alcada
     * @return array
     **/
    public function atualizarAlcada(int $id, array $alcada)
    {        
        $alias = false;
        // foi criado essa parametrizacao porque a criacao da alcada vale apenas para SC3 ou SC5
        if ($alcada['alias'] === "SC3") $alias = true;
        if ($alcada['alias'] === "SC5") $alias = true;
        
        if(! $alias)
            abort(404, "Nenhum registro id# ".$id." encontrado para atualizar!"); 
        
        $verificaRegistro = $this->verificaRegistro($alcada); 
        if(isset($verificaRegistro['id']) && $verificaRegistro['id'] !== $id)
            abort(404, "Nenhum registro id# ".$id." encontrado para atualizar!"); 
            
        $result = $this->engineAprovacaoAlcadasRepository->atualizar($id, $alcada);
        $message = "nao foi atualizado!";
        if ($result)
            $message = "atualizado com sucesso!";
            return Array("id_return" => "Registro id# ".$id." ".$message);      
    }
    
    /**
     * Deleta um registro por ID
     * 
     * @param int $id
     * @return mixed
     **/
    public function deletarAlcada(int $id)
    {
        $verificaId = $this->verificaId($id); 
        if (! isset($verificaId['id']) || $verificaId['id'] !== $id)
            abort(404, "Nenhum registro id# ".$id." encontrado para deletar!"); 
        
        $message = "Ocorreu um erro ao deletar esse registro!";      
        $result = $this->engineAprovacaoAlcadasRepository->deletar(Beethoven::getEnterpriseId(), $id);
        if($result >= 1)
            $message = "Registro id# ".$id." deletado com sucesso!";
        
        return Array("id_return" => $message);        
    }
    
    
    /**
     * Verifica se o registro consultado ja existe
     * 
     * @param array $alcada
     * @return mixed
     **/
    public function verificaRegistro(array $alcada)
    {
        $result = $this->engineAprovacaoAlcadasRepository->verificaRegistro(Beethoven::getEnterpriseId(), $alcada);
        return $result;
    }

    /**
     * Verifica se o ID consultado ja existe
     * 
     * @param int $id
     * @return mixed
     **/
    public function verificaId(int $id)
    {
        $result = $this->engineAprovacaoAlcadasRepository->verificaId(Beethoven::getEnterpriseId(), $id);
        return $result;       
    }
    
}