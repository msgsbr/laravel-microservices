<?php
namespace App\Services;

use App\Repositories\CaixaProdutoRepository;
use App\Repositories\CaixaRepository;
use App\Services\Interfaces\CaixaServiceInterface;
use Beethoven\Common\Beethoven;
use Beethoven\Common\BeethovenClient;
use Beethoven\Service\Service;
use PhpParser\Node\Expr\Array_;
use PHPUnit\Runner\Exception;

/**
 * Class Caixa
 *
 * @package App\Services
 */
class CaixaService extends Service implements CaixaServiceInterface
{
    
    public $id;
    
    public $codigo;
    
    public $descricao;
    
    public $larguraExterna = 0;
    
    public $comprimentoExterno = 0;
    
    public $profundidadeExterna = 0;
    
    public $larguraInterna = 0;
    
    public $comprimentoInterno = 0;
    
    public $profundidadeInterna = 0;
    
    public $pesoCaixaVazia = 0;
    
    public $pesoMaximo = 0;
    
    public $altura = 0;
    
    public $fracionada = false;
    
    public $status = true;
    
    private $caixaRepository;
    
    public $request;
    
    public function __construct(CaixaRepository $caixaRepository)
    {
        $this->caixaRepository = $caixaRepository;
    }
    
    /**
     *
     * @return mixed
     */
    public function buscarTodos()
    {
        $response = $this->caixaRepository->readAll();
        
        return $response;
    }
    
       
    /**
     *
     * @param int $id
     * @return mixed
     */
    public function buscarPorId(int $id)
    {
        #obter todos os dados passados no parametro "field"
        $field  = Beethoven::request()->dataField()->getAll();
        $response = $this->caixaRepository->buscarPorId($id, $field);
        
        
        return $response;
    }
    
    /**
     *
     * @param
     *            $data
     * @return array|string
     */
    public function incluirCaixa(){
        
        $data = Beethoven::request()->dataInput()->getAll();
        //print_r($data);die('=');
        try{
            
            $caixa          = $this->criarCaixa($data);
            
            $resultCaixa    = $this->gravarCaixa($caixa);
            
            return $resultCaixa;
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }
    
    /**
     *
     * @param
     *            $data
     * @return array|string
     */
    public function editarCaixa($id){
        
        $data = Beethoven::request()->dataInput()->getAll();
        
        try{
            
            $caixa          = $this->criarCaixa($data);
            
            $resultCaixa    = $this->atualizarCaixa($id, $caixa);
            
            return $resultCaixa;
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }
    
    /**
     *
     * @param array $data
     * @return array
     */
    public function criarCaixa($data)
    {
        $service = $this->setterDynamic($this, $data);
        
        $caixa = Array(
            'CX_ID' => $service->id,
            'CX_DESC' => $service->descricao,
            'CX_IDEA1' => Beethoven::getEnterpriseId(),
            'CX_CRIADOR' => Beethoven::getUserId(),
            'CX_ALTERADOR' => Beethoven::getUserId(),
            'CX_LARGURA_EXTERNA' => $service->larguraExterna,
            'CX_COMPRIMENTO_EXTERNO' => $service->comprimentoExterno
            );
        
        return $caixa;
    }
    
    /**
     *
     * @param int $id
     * @return mixed
     */
    public function deletarCaixa($id)
    {
        $response = $this->caixaRepository->deletar($id);
        return $response;
    }
    
    public function gravarCaixa($caixa)
    {
        $result = $this->caixaRepository->salvar($caixa);
        
        return $result;
    }
    
    public function atualizarCaixa($id, $caixa)
    {
        $result = $this->caixaRepository->atualizar($id, $caixa);
        
        return $result;
    }
    
    /**
     *
     * @param int $id
     * @return int
     */
    public function id(int $id)
    {
        $this->id = $id;
    }
    
    /**
     *
     * @param string $codigo
     * @return string
     */
    public function codigo($codigo)
    {
        $this->codigo = $codigo;
    }
    
    /**
     *
     * @param string $descricao
     * @return string
     */
    public function descricao(string $descricao)
    {
        $this->descricao = $descricao;
    }
    
    /**
     *
     * @param float $larguraExterna
     * @return float
     */
    public function larguraExterna(float $larguraExterna)
    {
        $this->larguraExterna = $larguraExterna;
    }
    
    /**
     *
     * @param float $comprimentoExterno
     * @return float
     */
    public function comprimentoExterno(float $comprimentoExterno)
    {
        $this->comprimentoExterno = $comprimentoExterno;
    }
    
    /**
     *
     * @param float $profundidaeExterna
     * @return float
     */
    public function profundidadeExterna(float $profundidaeExterna)
    {
        $this->profundidadeExterna = $profundidaeExterna;
    }
    
    /**
     *
     * @param float $larguraInterna
     * @return float
     */
    public function larguraInterna(float $larguraInterna)
    {
        $this->larguraInterna = $larguraInterna;
    }
    
    /**
     *
     * @param float $comprimentoInterno
     * @return float
     */
    public function comprimentoInterno(float $comprimentoInterno)
    {
        $this->comprimentoInterno = $comprimentoInterno;
    }
    
    /**
     *
     * @param float $profundidadeInterna
     * @return float
     */
    public function profundidadeInterna(float $profundidadeInterna)
    {
        $this->profundidadeInterna = $profundidadeInterna;
    }
    
    /**
     *
     * @param float $pesoCaixaVazia
     * @return float
     */
    public function pesoCaixaVazia(float $pesoCaixaVazia)
    {
        $this->pesoCaixaVazia = $pesoCaixaVazia;
    }
    
    /**
     *
     * @param float $pesoMaximo
     * @return float
     */
    public function pesoMaximo(float $pesoMaximo)
    {
        $this->pesoMaximo = $pesoMaximo;
    }
    
    /**
     *
     * @param float $altura
     * @return float
     */
    public function altura(float $altura)
    {
        $this->altura = $altura;
    }
    
    /**
     *
     * @param bool $fracionada
     * @return bool
     */
    public function fracionada(bool $fracionada)
    {
        $this->fracionada = $fracionada;
    }
    
    /**
     *
     * @param bool $status
     * @return bool
     */
    public function status(bool $status)
    {
        $this->status = $status;
    }
}