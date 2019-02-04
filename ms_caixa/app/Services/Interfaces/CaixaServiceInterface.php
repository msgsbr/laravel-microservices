<?php
/**
 * Created by PhpStorm.
 * User: alinefreire
 * Date: 20/02/2018
 * Time: 09:42
 */

namespace App\Services\Interfaces;
use Zend\Stdlib\Request;


/**
 * Interface CaixaServiceInterface
 * @package App\Repositories\Interfaces
 */
interface CaixaServiceInterface{

    /**
     * @param int $id
     * @return int
     */
    public function id(int $id);


    /**
     * @param string $codigo
     * @return string
     */
    public function codigo($codigo);


    /**
     * @dbalias:CX_DESC
     * @param string $descricao
     * @return string
     */
    public function descricao(string $descricao);

    /**
     * @param float $larguraExterna
     * @return float
     */
    public function larguraExterna(float $larguraExterna);


    /**
     * @param float comprimentoExterno
     * @return float
     */
    public function comprimentoExterno(float $comprimentoExterno);


    /**
     * @param float $profundidaeExterna
     * @return float
     */
    public function profundidadeExterna(float $profundidaeExterna);


    /**
     * @param float $larguraInterna
     * @return float
     */
    public function larguraInterna(float $larguraInterna);


    /**
     * @param float $comprimentoInterno
     * @return float
     */
    public function comprimentoInterno(float $comprimentoInterno);


    /**
     * @param float $profundidadeInterna
     * @return float
     */
    public function profundidadeInterna(float $profundidadeInterna);


    /**
     * @param float $pesoCaixaVazia
     * @return float
     */
    public function pesoCaixaVazia(float $pesoCaixaVazia);


    /**
     * @param float $pesoMaximo
     * @return float
     */
    public function pesoMaximo(float $pesoMaximo);


    /**
     * @param float $altura
     * @return float
     */
    public function altura(float $altura);


    /**
     * @param bool $fracionada
     * @return float
     */
    public function fracionada(bool $fracionada);


    /**
     * @param bool $status
     * @return bool
     */
    public function status(bool $status);

    /**
     * @return mixed
     */
    public function buscarTodos();

    /**
     * @param int $id
     * @return mixed
     */
    public function buscarPorId(int $id);



}