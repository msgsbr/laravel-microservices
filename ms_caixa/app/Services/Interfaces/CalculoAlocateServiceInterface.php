<?php
/**
 * Created by PhpStorm.
 * User: alinefreire
 * Date: 20/02/2018
 * Time: 09:42
 */

namespace App\Services\Interfaces;


/**
 * Interface CaixaServiceInterface
 * @package App\Repositories\Interfaces
 */
interface CalculoAlocateServiceInterface{

    /**
     * @param int $caixaId
     * @return int
     */
     function caixaId(int $caixaId):int;

    /**
     * @param int $qtdeItensParaAlocar
     * @return int
     */
     function qtdeItensParaAlocar(int $qtdeItensParaAlocar):int;

    /**
     * @param float $pesoMaximoDaCaixa
     * @return float
     */
     function pesoMaximoDaCaixa(float $pesoMaximoDaCaixa):float;

    /**
     * @param int $itensRestantes
     * @return int
     */
     function itensRestantes(int $itensRestantes):int;

    /**
     * @param int $totalDeItensNaCaixa
     * @return int
     */
     function totalDeItensNaCaixa(int $totalDeItensNaCaixa):int;

}