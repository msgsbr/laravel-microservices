<?php
namespace App\Repositories;

use App\Models\Caixa;
use App\Repositories\Interfaces\CaixaInterface;
use Beethoven\Repository\Repository;
use Beethoven\Common\Beethoven;
use Beethoven\Common\BeethovenClient;

/**
 * Class CaixaRepository
 *
 * @package App\Repositories
 */
class CaixaRepository extends Repository implements CaixaInterface
{
    
    protected $fields = Array(
        'CX_ID',
        'CX_DESC',
        'CX_COMPRIMENTO_EXTERNO',
        'CX_LARGURA_EXTERNA'
        );
    
    /**
     * CaixaRepository constructor.
     *
     * @param Caixa $model
     */
    public function __construct(Caixa $model)
    {
        parent::__construct($model);
    }
    
    /**
    
    *
    * @return mixed
    * @throws \Beethoven\Repository\RepositoryException
    */
    public function readAll($param = [])
    {
        /*
         * Exemplo consumindo outro servico
         * $caixaProduto = $this->deleteCaixaProduto();
         * dd($caixaProduto);
         */
//         $caixaProduto = $this->getCaixaProduto();
//         dd($caixaProduto);
        
        /*
         * Exemplo fazendo join
         * $this->caixaProduto(258);
         *
         */
        
        /*
         * Exemplo where
         * // $query = $this->columns($this->fields)->where("CX_COMPRIMENTO_EXTERNO", ">=", '10')->where("CX_COMPRIMENTO_EXTERNO", "<=", '20')->paginate();
         * // dd($query);
         * // return $query;
         *
         */

        
        /*
         * Exemplo where com callback
         * $data = $this->columns($this->fields)->where(function($query) use ($id){
         * $query->find($id);
         * })->get();
         */
        
        #obter todos os dados passados no parametro "field"
        $field    = Beethoven::request()->dataField()->getAll();
        
        $filter   = Beethoven::request()->dataFilter()->getAll();

        #obter todos os dados passados no parametro "order"
        $order = Beethoven::request()->dataOrder()->getAll();
                
        //obter A quantidade de resultados por página
        $per_page = Beethoven::request()->getPerPage();
              
        return $query = $this->columns($field)->whereEqual($filter)->orderByRaw($order)->paginateCustom($per_page);
        
    }
    
    /**
     * Exemplo de join
     *
     * @param int $id
     * @return array
     */
    public function caixaProduto(int $id)
    {
        try {
            $this->beginTransaction();
            
            $caixa = $this->find(12);
            dd($caixa->get()->toArray());
            
            $caixaProduto = $caixa->caixaProduto();
            // dd($caixaProduto->get()->toArray());
            
            $produto = $caixa->produto();
            dd($produto->get()->toArray());
            
            $this->commit();
        } catch (\Exception $e) {
            // Woopsy
            $this->rollBack();
        }
        
        // return $caixaProduto->get()->toArray();
    }
    
    /**
     *
     * @param int $id
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     */
    public function buscarPorId(int $id, $field)
    {
        // $query = $this->columns($this->fields)->where("CX_COMPRIMENTO_EXTERNO", ">=", '10')->where("CX_COMPRIMENTO_EXTERNO", "<=", '20')->get()->toArray();
        // return $query;
        return $this->columns($field)
        ->findOneById($id)
        ->getOriginal();
    }
    
    /**
     *
     * @param
     *            $caixa
     * @return array
     */
    public function salvar($caixa)
    {
        $hasCaixa = $this->where("CX_ID", 7000)->get($this->fields);
        
        if (count($hasCaixa) == 0)
            $result = $this->add($caixa)->only($this->fields);
            
            return $result;
    }
    
    /**
     *
     * @param int $id
     * @param
     *            $caixa
     * @return array
     * @throws \Beethoven\Repository\InvalidDataProvidedException
     */
    public function atualizar(int $id, $caixa)
    {
        $caixa = array_except($caixa, 'CX_ID');
        
        if ($this->updateOneById($id, $caixa)) {
            return Array(
                "id_return" => $id
                );
        } else {
            abort(500, 'Falha na atualização');
        }
    }
    
    /**
     * Deletar Caixa
     *
     * @param int $id
     */
    public function deletar(int $id)
    {
        $caixa = $this->find($id);
        if ($caixa)
            $this->where("CX_ID", $id)->delete();
            
            if (! $this->find($id))
                return 'deleted';
    }
    
    /**
     * Exemplo consumindo outro servico
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getCaixaProduto()
    {
        $response = BeethovenClient::get('http://installer.microservice.local.com/caixaProduto', [
            'headers' => [
                'enterprise-id' => Beethoven::getEnterpriseId(),
                'user-id' => Beethoven::getUserId()
            ]
        ]);
        
        $code = $response->getStatusCode();
        $reason = $response->getReasonPhrase();
        
        $stream = $response->getBody();
        $contents = $stream->getContents();
        return $contents;
    }
    
    /**
     * Exemplo consumindo outro servico
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getByIdCaixaProduto()
    {
        $response = BeethovenClient::get('http://installer.microservice.local.com/caixaProduto/4', [
            'headers' => [
                'enterprise-id' => Beethoven::getEnterpriseId(),
                'user-id' => Beethoven::getUserId()
            ]
        ]);
        
        $code = $response->getStatusCode();
        $reason = $response->getReasonPhrase();
        
        $stream = $response->getBody();
        $contents = $stream->getContents();
        
        return $contents;
    }
    
    /**
     * Exemplo consumindo outro servico
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function postCaixaProduto()
    {
        $response = BeethovenClient::post('http://installer.microservice.local.com/caixaProduto', [
            'headers' => [
                'enterprise-id' => Beethoven::getEnterpriseId(),
                'user-id' => Beethoven::getUserId()
            ],
            'json' => [
                'caixaId' => '324',
                'produtoId' => '1486234',
                'qtdeMaxima' => '2',
                'qtdeMinima' => '1'
            ]
        ]);
        
        $code = $response->getStatusCode();
        $reason = $response->getReasonPhrase();
        
        $stream = $response->getBody();
        $contents = $stream->getContents();
        
        return $contents;
    }
    
    /**
     * Exemplo consumindo outro servico
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function putCaixaProduto()
    {
        $response = BeethovenClient::put('http://installer.microservice.local.com/caixaProduto/1', [
            'headers' => [
                'enterprise-id' => Beethoven::getEnterpriseId(),
                'user-id' => Beethoven::getUserId()
            ],
            'json' => [
                'caixaId' => '324',
                'produtoId' => '1486231',
                'qtdeMaxima' => '3',
                'qtdeMinima' => '1'
            ]
        ]);
        
        $code = $response->getStatusCode();
        $reason = $response->getReasonPhrase();
        
        $stream = $response->getBody();
        $contents = $stream->getContents();
        return $contents;
    }
    
    /**
     * Exemplo consumindo outro servico
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function deleteCaixaProduto()
    {
        $response = BeethovenClient::delete('http://installer.microservice.local.com/caixaProduto/5', [
            'headers' => [
                'enterprise-id' => Beethoven::getEnterpriseId(),
                'user-id' => Beethoven::getUserId()
            ]
        ]);
        
        $code = $response->getStatusCode();
        $reason = $response->getReasonPhrase();
        
        $stream = $response->getBody();
        $contents = $stream->getContents();
        return $contents;
    }
}
