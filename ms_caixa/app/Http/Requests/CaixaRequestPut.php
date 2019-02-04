<?php
namespace App\Http\Requests;

use Beethoven\Http\Request;
use Beethoven\Http\RuleOption;

class CaixaRequestPut extends Request
{

    protected function rules(){
       
        $rule['CX_Desc'] = array(
            "ALIAS" => "descricao",
            "required"=> false,
            "TYPE"=> RuleOption::TYPE_STRING,
        );

        $rule['CX_LARGURA_EXTERNA'] = array(
            "NAME" => "CX_LARGURA_EXTERNA",
            "ALIAS" => "larguraExterna",
            "TYPE"=> RuleOption::TYPE_NUMERIC,
        );

        $rule['CX_COMPRIMENTO_EXTERNO'] = array(
            "NAME" => "CX_COMPRIMENTO_EXTERNO",
            "ALIAS" => "comprimentoExterno",
            "TYPE"=> RuleOption::TYPE_NUMERIC,
        );
        return $rule;

    }

    protected function rulesResponse(){

        $rule['ID_RETURN'] = array(
            "NAME" => "CX_ID",
            "ALIAS" => "id"
        );

        return $rule;

    }
}

