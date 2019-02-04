<?php
namespace App\Http\Requests;

use Beethoven\Http\Request;
use Beethoven\Http\RuleOption;

class CaixaProdutoRequestAll extends Request
{

    protected function rulesResponse(){

        $rule['CX_SB1_ID'] = array(
            "NAME" => "CX_SB1_ID",
            "ALIAS" => "id"
        );

        $rule['CX_SB1_IDCX'] = array(
            "NAME" => "CX_SB1_IDCX",
            "ALIAS" => "caixaId"
        );

        $rule['CX_SB1_IDSB1'] = array(
            "NAME" => "CX_SB1_IDSB1",
            "ALIAS" => "produtoId"
        );

        $rule['CX_SB1_QUANTIDADE_MAXIMA'] = array(
            "NAME" => "CX_SB1_QUANTIDADE_MAXIMA",
            "ALIAS" => "qtdeMaxima"
        );

        $rule['CX_SB1_QUANTIDADE_MINIMA'] = array(
            "NAME" => "CX_SB1_QUANTIDADE_MINIMA",
            "ALIAS" => "qtdeMinima"
        );

        return $rule;

    }
        
}
