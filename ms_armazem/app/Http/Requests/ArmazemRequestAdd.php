<?php

namespace App\Http\Requests;
use Beethoven\Http\Request;
use Beethoven\Http\RuleOption;

class ArmazemRequestAdd extends Request
{

    protected function rules(){

        $rule['SBW_Desc'] = array(
            "ALIAS" => "SBW_Desc",
            "TYPE"=> RuleOption::TYPE_STRING,
        );
        $rule['SBW_DisponivelVenda'] = array(
            "ALIAS" => "SBW_DisponivelVenda",
            "TYPE"=> RuleOption::TYPE_STRING,
        );
       
        return $rule;

    }

    protected function rulesResponse(){

        $rule['ID_RETURN'] = array(
            "NAME" => "SBW_ID",
            "ALIAS" => "id"
        );
        $rule['SBW_Desc'] = array(
            "NAME" => "SBW_Desc",
            "ALIAS" => "SBW_Desc"
        );
        $rule['SBW_DisponivelVenda'] = array(
            "NAME" => "SBW_DisponivelVenda",
            "ALIAS" => "SBW_DisponivelVenda"
        );
        $rule['SBW_CRIADOR'] = array(
            "ALIAS" => "SBW_CRIADOR",
            "ORDER"=> true,
        );
        $rule['SBW_ALTERADOR'] = array(
            "ALIAS" => "SBW_ALTERADOR",
            "ORDER"=> true,
        );
        $rule['SBW_IDEA1'] = array(
            "ALIAS" => "SBW_IDEA1",
            "ORDER"=> true,
        );
        return $rule;

    }
}