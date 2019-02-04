<?php
namespace App\Models;

use Beethoven\Database\Orm\Model;

/**
 * Controle de cadastro das alcadas de aprovacao no ERP.
 * 
 * Realiza o CRUD (criar, ler, editar, deletar) do cadastro das alcadas de aprovacao no ERP.
 * 
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 * 
 * Class EngineAprovacaoAlcadas
 * @package Beethoven\Database\Orm\Model
 **/
class EngineAprovacaoAlcadas extends Model
{
    
    /**
     * Tabela relacionada na Model
     **/
    protected $table = 'apr_alcadas';

    /**
     * Chave primaria da tabela relacionada na Model
     **/
    public $primaryKey = 'id';

    /**
     * Quando declarada e atribuido "false", desabilita o uso automatico do enterpriseID enviado na requisicao HTTP, sendo necessario passar esse parametro nos metodos.
     * Usa-se essa opcao quando nao temos como padrao "{tabela}_IDEA1" na coluna da tabela.
     **/
    public $enterprise = false;

    /**
     * Mass Assignment. Desta forma conseguimos criar um registro, passando todos os dados de uma sé vez.
     * Porém, se não adicionarmos os campos fillables, no model, o Laravel bloqueia este tipo de atividade
     **/
    protected $fillable = [
        'id',
        'alias',
        'alcadas',
        'ativo',
        'fluxo_completo',
        'criterio_menor',
        'OrcAlteraAprovado'
    ];

}