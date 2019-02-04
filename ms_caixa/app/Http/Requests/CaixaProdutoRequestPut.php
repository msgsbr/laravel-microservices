<?php
namespace App\Http\Requests;

use Beethoven\Http\Request;
use Beethoven\Http\RuleOption;

class CaixaProdutoRequestPut extends Request
{

    protected function rules()
    {
        $rule['CX_SB1_IDCX'] = array(
            "NAME" => "CX_SB1_IDCX",
            "ALIAS" => "caixaId",
            "TYPE" => RuleOption::TYPE_INTEGER
        );
        
        $rule['CX_SB1_IDSB1'] = array(
            "NAME" => "CX_SB1_IDSB1",
            "ALIAS" => "produtoId",
            "TYPE" => RuleOption::TYPE_INTEGER
        );
        
        $rule['CX_SB1_QUANTIDADE_MAXIMA'] = array(
            "NAME" => "CX_SB1_QUANTIDADE_MAXIMA",
            "ALIAS" => "qtdeMaxima",
            "TYPE" => RuleOption::TYPE_INTEGER
        );
        
        $rule['CX_SB1_QUANTIDADE_MINIMA'] = array(
            "NAME" => "CX_SB1_QUANTIDADE_MINIMA",
            "ALIAS" => "qtdeMinima",
            "TYPE" => RuleOption::TYPE_INTEGER
        );
        
        return $rule;
    }

    protected function rulesResponse()
    {
        $rule['ID_RETURN'] = array(
            "NAME" => "CX_ID",
            "ALIAS" => "id"
        );
        
        return $rule;
    }
}

