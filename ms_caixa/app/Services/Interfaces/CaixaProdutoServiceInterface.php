<?php
/**
 * Created by PhpStorm.
 * User: alinefreire
 * Date: 20/02/2018
 * Time: 14:49
 */

namespace App\Services\Interfaces;

/**
 * Interface CaixaProdutoServiceInterface
 * @package App\Services\Interfaces
 */
Interface CaixaProdutoServiceInterface
{
    /**
     * @param int $caixaProdutoid
     * @return int
     */
    function id(int $caixaProdutoid);

    /**
     * @param int $caixaId
     * @return int
     */
    function caixaId(int $caixaId);

    /**
     * @param int $produtoId
     * @return int
     */
    function produtoId(int $produtoId);

    /**
     * @param int $qtdeMaxima
     * @return int
     */
    function qtdeMaxima(int $qtdeMaxima);

    /**
     * @param int $qtdeMinima
     * @return int
     */
    function qtdeMinima(int $qtdeMinima);

    /**
     * @param bool $status
     * @return bool
     */
    function status(bool $status);

}