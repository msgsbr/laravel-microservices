<?php
namespace App\Models;

use Beethoven\Database\Orm\Model;

/**
 * Controle dos Tipos de Alcadas de aprovacao disponiveis para uso no ERP.
 *
 * Realiza a leitura dos Tipos de Alcadas de aprovacao disponiveis para uso no ERP*. 
 * *Hoje, nao existe tabela para cadastro e uso desse servico, porem a estrutura ja foi desenvolvida para futuras implementacoes.
 *
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 *
 * Class EngineAprovacaoProcessos
 * @package Beethoven\Database\Orm\Model
 **/
class EngineAprovacaoProcessos extends Model
{

    /**
     * Tabela relacionada na Model
     **/
    protected $table = '{nome-tabela}';

    /**
     * Chave primaria da tabela relacionada na Model
     **/
    public $primaryKey = '{nome-chave-primaria}';

    /**
     * Mass Assignment. Desta forma conseguimos criar um registro, passando todos os dados de uma sé vez.
     * Porém, se não adicionarmos os campos fillables, no model, o Laravel bloqueia este tipo de atividade
     **/
    protected $fillable = [
        '{nomes-campos}',
        '{nomes-campos}',
        '{nomes-campos}'
    ];

}