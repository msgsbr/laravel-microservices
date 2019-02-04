<?php
/**
 * Created by PhpStorm.
 * User: alinefreire
 * Date: 16/02/2018
 * Time: 15:21
 */

namespace App\Repositories;

use App\Models\CaixaProduto;
use App\Repositories\Interfaces\CaixaProdutoInterface;
use Beethoven\Repository\Repository;

/**
 * Class ProdutoInterfaceRepository
 * @package App\Repositories
 */
class CaixaProdutoRepository extends Repository implements CaixaProdutoInterface
{

    protected $fields = Array('CX_SB1_ID', 'CX_SB1_IDCX', 'CX_SB1_IDSB1','CX_SB1_QUANTIDADE_MAXIMA','CX_SB1_QUANTIDADE_MINIMA');

    /**
     * CaixaProdutoRepository constructor.
     * @param CaixaProduto $model
     */
    public function __construct(CaixaProduto $model)
    {

        parent::__construct($model);
    }

    /**
     * @return mixed
     * @throws \Beethoven\Repository\RepositoryException
     */
    public function readAll()
    {
        return $this->columns($this->fields)->paginate(request('per_page'));
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function buscarPorId(int $id)
    {
        return $this->columns($this->fields)->findOneById($id)->getOriginal();
    }

    /**
     * @param $produtos
     * @return array
     */
    public function salvar($produtos){

        $result = $this->add($produtos)->only($this->fields);
        return $result;
    }

    /**
     * @param int $id
     * @param $produtos
     * @return array
     * @throws \Beethoven\Repository\InvalidDataProvidedException
     */
    public function atualizar(int $id, $produtos){

        $produtos = array_except($produtos,'CX_SB1_ID');

        if($this->updateOneById($id,$produtos)){
            return Array("ID_RETURN" => $id);
        }
        else{
            abort(500, 'Falha na atualização');
        }
    }


    /**
     * @param int $id
     */
    function deletar(int $id)
    {
        $caixa = $this->find($id);
        if ($caixa)
            $this->where("CX_SB1_ID", $id)->delete();
            
            if(!$this->find($id))
                return 'deleted';
    }

}