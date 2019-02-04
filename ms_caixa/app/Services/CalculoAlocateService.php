<?php
/**
 * Created by PhpStorm.
 * @User: alinefreire
 * Date: 19/02/2018
 * Time: 12:18
 */

namespace App\Services;

use App\Services\Interfaces\CalculoAlocateServiceInterface;
use Beethoven\Common\Beethoven;
use Beethoven\Common\BeethovenClient;
use Beethoven\Service\Service;
use Beethoven\Collection;

/**
 * Class CalculoAlocateService
 * @package App\Services
 */
class CalculoAlocateService extends Service implements CalculoAlocateServiceInterface
{
    public $caixaId;
    public $qtdeItensParaAlocar;
    public $pesoMaximoDaCaixa;
    public $itensRestantes;
    public $fracionada;
    public $totalDeItensNaCaixa;
    public $request;

    /**
     * @param $data
     * @return array
     */
    function calcularAlocacaoDeItens($data){

        $this->setterDynamic($this,$data);

        $this->setaDadosDaCaixa();

        $this->calculaQtdeDeItensParaAlocar($this->qtdeItensParaAlocar, $this->pesoMaximoDaCaixa);

        $this->calculaItensRestantes($this->qtdeItensParaAlocar, $this->pesoMaximoDaCaixa);

        return $result =  Array('totalDeItensNaCaixa'   => $this->totalDeItensNaCaixa,
                                'itensRestantes'        => $this->itensRestantes);
    }

    /**
     * @param int $qtdeItensParaAlocar
     * @param float $pesoMaximoDaCaixa
     * @return int
     */
    function calculaQtdeDeItensParaAlocar(int $qtdeItensParaAlocar, float $pesoMaximoDaCaixa):int{

        $total = (int) $qtdeItensParaAlocar / $this->pesoMaximoDaCaixa;

        return $this->totalDeItensNaCaixa($total);
    }

    /**
     * @param int $qtdeItensParaAlocar
     * @param float $pesoMaximoDaCaixa
     */
    function calculaItensRestantes(int $qtdeItensParaAlocar, float $pesoMaximoDaCaixa){

        $total = $qtdeItensParaAlocar % $this->pesoMaximoDaCaixa;

        return $this->itensRestantes($total);
    }


    /**
     * @param int $caixaId
     * @return mixed
     */
    function consultarCaixa(int $caixaId){

        $response = BeethovenClient::get('http://installer.microservice.local.com/caixa/'.$caixaId, [
            'headers' => [
                'enterprise-id' => Beethoven::getEnterpriseId(),
                'user-id'=>'0'
            ]
        ]);


        $stream = $response->getBody();
        $contents = json_decode($stream->getContents(),true);

        return $contents;
    }

    function setaDadosDaCaixa(){

        $caixa      = $this->consultarCaixa($this->caixaId);

        //print_r($caixa);exit;
        $this->pesoMaximoDaCaixa((float) floatval($caixa['larguraExterna']));
    }

    /**
     * @param int $caixaId
     * @return int
     */
    function caixaId(int $caixaId): int
    {
        return $this->caixaId = $caixaId;
    }

    /**
     * @param int $qtdeItensParaAlocar
     * @return int
     */
    function qtdeItensParaAlocar(int $qtdeItensParaAlocar): int
    {
        return $this->qtdeItensParaAlocar = $qtdeItensParaAlocar;
    }

    /**
     * @param float $pesoMaximoDaCaixa
     * @return float
     */
    function pesoMaximoDaCaixa(float $pesoMaximoDaCaixa): float
    {
        return $this->pesoMaximoDaCaixa = $pesoMaximoDaCaixa;
    }

    /**
     * @param int $itensRestantes
     * @return int
     */
    function itensRestantes(int $itensRestantes): int
    {
        return $this->itensRestantes = $itensRestantes;
    }


    /**
     * @param int $totalDeItensNaCaixa
     * @return int
     */
    function totalDeItensNaCaixa(int $totalDeItensNaCaixa): int
    {
        return $this->totalDeItensNaCaixa = $totalDeItensNaCaixa;
    }


}