<?php
/**
 * Created by PhpStorm.
 * User: alinefreire
 * Date: 05/03/2018
 * Time: 12:22
 */

namespace App\Http\Requests;
use Beethoven\Http\Request;
use Beethoven\Http\RuleOption;

class CalculoAlocateRequestAdd extends Request
{

    protected function rules(){

        $rule['caixaId'] = array(
            "GROUP" => "Calculo",
            "ALIAS" => "caixaId",
            "required"=> true,
            "TYPE"=> RuleOption::TYPE_INTEGER,
        );

        $rule['qtdeItensParaAlocar'] = array(
            "GROUP" => "Calculo",
            "ALIAS" => "qtdeItensParaAlocar",
            "required"=> true,
            "TYPE"=> RuleOption::TYPE_INTEGER,
        );
        return $rule;

    }

    protected function rulesResponse(){

        $rule['ID_RETURN'] = array(
            "NAME" => "totalDeItensNaCaixa",
            "GROUP" => "Calculo",
            "ALIAS" => "totalDeItensNaCaixa",
            "DEFAULT"=> true,
        );

        $rule['itensRestantes'] = array(
            "NAME" => "itensRestantes",
            "GROUP" => "Calculo",
            "ALIAS" => "itensRestantes",
            "DEFAULT"=> true,
        );
        return $rule;

    }
}