<?php
namespace App\Services;

use App\Services\Interfaces\CaixaProdutoServiceInterface;
use Beethoven\Service\Service;
use Beethoven\Common\Beethoven;
use App\Repositories\CaixaProdutoRepository;

/**
 * Class ProdutoInterface
 *
 * @package App\Services
 */
class CaixaProdutoService extends Service implements CaixaProdutoServiceInterface
{

    protected $fields = [
        'CX_SB1_ID',
        'CX_SB1_IDSB1',
        'CX_SB1_IDCX',
        'CX_SB1_QUANTIDADE_MAXIMA',
        'CX_SB1_QUANTIDADE_MINIMA'
    ];

    public $id;

    public $caixaId;

    public $produtoId;

    public $qtdeMaxima = 0;

    public $qtdeMinima = 0;

    public $status = true;

    public $produtoRepository;

    public function __construct(CaixaProdutoRepository $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    /**
     *
     * @return mixed
     */
    public function buscarTodos()
    {
        $response = $this->produtoRepository->readAll();
        return $response;
    }

    /**
     *
     * @param int $id
     * @return mixed
     */
    public function buscarPorId(int $id)
    {
        $response = $this->produtoRepository->columns($this->fields)->findOneById($id);
        return $response;
    }

    /**
     *
     * @param
     *            $data
     * @return array|string
     */
    public function incluirProdutosNaCaixa($data)
    {
        try {
            
            $produtos = $this->criarProdutosDestaCaixa($data);
            
            $resultProdutos = $this->gravarProdutosDestaCaixa($produtos);
            
            return $resultProdutos;
        } catch (\Exception $e) {
            
            dd($e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     *
     * @param
     *            $data
     * @return array|string
     */
    public function atualizarProdutosDestaCaixa($id, $data)
    {
        try {
            
            $produtos = $this->criarProdutosDestaCaixa($data);
            
            $resultProdutos = $this->editarProdutosDestaCaixa($id, $produtos);
            
            return $resultProdutos;
        } catch (\Exception $e) {
            
            return $e->getMessage();
        }
    }

    /**
     *
     * @param array $data
     * @param
     *            $caixaId
     * @return array
     */
    public function criarProdutosDestaCaixa($data)
    {
        
        /*
         * foreach ($data['produtos'] as $key => $item) {
         *
         * $serviceProduto = $this->setterDynamic($this, $item);
         *
         * $produtos = Array(
         * 'CX_SB1_ID' => $serviceProduto->id,
         * 'CX_SB1_IDSB1' => $serviceProduto->produtoId,
         * 'CX_SB1_IDCX' => $serviceProduto->caixaId,
         * 'CX_SB1_IDEA1' => Beethoven::getEnterpriseId(),
         * 'CX_SB1_QUANTIDADE_MAXIMA' => $serviceProduto->qtdeMaxima,
         * 'CX_SB1_QUANTIDADE_MINIMA' => $serviceProduto->qtdeMinima);
         * }
         * return $produto;
         */
        return [
            'CX_SB1_ID' => isset($data['id']) ? $data['id'] : null,
            'CX_SB1_IDSB1' => $data['produtoId'],
            'CX_SB1_IDCX' => $data['caixaId'],
            'CX_SB1_IDEA1' => Beethoven::getEnterpriseId(),
            'CX_SB1_QUANTIDADE_MAXIMA' => $data['qtdeMaxima'],
            'CX_SB1_QUANTIDADE_MINIMA' => $data['qtdeMinima']
        ];
    }

    public function gravarProdutosDestaCaixa($produtos)
    {
        $result = $this->produtoRepository->salvar($produtos);
        
        return $result;
    }

    public function editarProdutosDestaCaixa($id, $produtos)
    {
        $result = $this->produtoRepository->atualizar($id, $produtos);
        
        return $result;
    }

    public function deletarProdutoDaCaixa($id)
    {
        $response = $this->produtoRepository->deletar($id);
        return $response;
    }

    /**
     *
     * @param int $caixaProdutoid
     * @return int
     */
    function id(int $id)
    {
        $this->id = $id;
    }

    /**
     *
     * @param int $caixaId
     * @return int
     */
    function caixaId(int $caixaId)
    {
        $this->caixaId = $caixaId;
    }

    /**
     *
     * @param int $produtoId
     * @return int
     */
    function produtoId(int $produtoId)
    {
        $this->produtoId = $produtoId;
    }

    /**
     *
     * @param int $qtdeMaxima
     * @return int
     */
    function qtdeMaxima(int $qtdeMaxima)
    {
        $this->qtdeMaxima = $qtdeMaxima;
    }

    /**
     *
     * @param int $qtdeMinima
     * @return int
     */
    function qtdeMinima(int $qtdeMinima)
    {
        $this->qtdeMinima = $qtdeMinima;
    }

    /**
     *
     * @param bool $status
     * @return bool
     */
    function status(bool $status)
    {
        $this->status = $status;
    }
}