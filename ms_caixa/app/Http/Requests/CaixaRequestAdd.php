<?php
/**
 * Created by PhpStorm.
 * User: alinefreire
 * Date: 02/03/2018
 * Time: 16:36
 */
namespace App\Http\Requests;

use Beethoven\Http\Request;
use Beethoven\Http\RuleOption;

class CaixaRequestAdd extends Request
{

    protected function rules()
    {
        $rule['CX_DESC'] = array(
            "ALIAS" => "descricao",
            "TYPE" => RuleOption::TYPE_STRING
        );
        
        $rule['CX_LARGURA_EXTERNA'] = array(
            "NAME" => "CX_LARGURA_EXTERNA",
            "ALIAS" => "larguraExterna",
            "TYPE" => RuleOption::TYPE_NUMERIC
        );
        
        $rule['CX_COMPRIMENTO_EXTERNO'] = array(
            "NAME" => "CX_COMPRIMENTO_EXTERNO",
            "ALIAS" => "comprimentoExterno",
            "TYPE" => RuleOption::TYPE_NUMERIC
        );
        
        return $rule;
    }

    protected function rulesResponse()
    {
        $rule['ID_RETURN'] = array(
            "NAME" => "CX_ID",
            "ALIAS" => "id"
        );
        
        $rule['CX_DESC'] = array(
            "NAME" => "CX_DESC",
            "ALIAS" => "descricao"
        );
        
        $rule['CX_LARGURA_EXTERNA'] = array(
            "NAME" => "CX_LARGURA_EXTERNA",
            "ALIAS" => "larguraExterna"
        );
        
        $rule['CX_COMPRIMENTO_EXTERNO'] = array(
            "NAME" => "CX_COMPRIMENTO_EXTERNO",
            "ALIAS" => "comprimentoExterno"
        );
        
        return $rule;
    }
}