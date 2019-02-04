<?php
namespace App\Models;

use Beethoven\Database\Orm\Model;

/**
 * Controle dos Perfis disponiveis para uso no cadastro da alcadas de aprovacao no ERP.
 *
 * Realiza a leitura dos Perfis disponiveis para uso no cadastro da alcadas de aprovacao no ERP.
 *
 * @author Marcelo Gava <marcelo.gava@erpflex.com.br>
 * @copyright  2018, ERPFlex - TI Educacional.
 * @version 1.0
 *
 * Class EngineAprovacaoPerfis
 * @package Beethoven\Database\Orm\Model
 **/
class EngineAprovacaoPerfis extends Model
{
    
    /**
     * Tabela relacionada na Model
     **/
    protected $table = 'MN2';

    /**
     * Chave primaria da tabela relacionada na Model
     **/
    public $primaryKey = 'MN2_ID';

    /**
     * Mass Assignment. Desta forma conseguimos criar um registro, passando todos os dados de uma sé vez.
     * Porém, se não adicionarmos os campos fillables, no model, o Laravel bloqueia este tipo de atividade
     **/
    protected $fillable = [
        'MN2_ID',
        'MN2_desc',
        'MN2_Admin',
        'MN2_CRIADOR',
        'MN2_ALTERADOR',
        'MN2_STATUS',
        'MN2_Nivel'
    ];

}