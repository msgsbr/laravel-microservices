<?php
namespace App\Http\Requests;

use Beethoven\Http\Request;
use Beethoven\Http\RuleOption;

class CaixaRequestGet extends Request
{

    protected function rulesResponse(){

        $rule['CX_ID'] = array(
            "NAME" => "CX_ID",
            "GROUP" => "Caixa",
            "ALIAS" => "id"
        );

        $rule['CX_DESC'] = array(
            "NAME" => "CX_DESC",
            "GROUP" => "Caixa",
            "ALIAS" => "descricao"
        );

        $rule['CX_LARGURA_EXTERNA'] = array(
            "NAME" => "CX_LARGURA_EXTERNA",
            "GROUP" => "Caixa",
            "ALIAS" => "larguraExterna"
        );

        $rule['CX_COMPRIMENTO_EXTERNO'] = array(
            "NAME" => "CX_COMPRIMENTO_EXTERNO",
            "GROUP" => "Caixa",
            "ALIAS" => "comprimentoExterno"
        );

        return $rule;

    }
    
}
