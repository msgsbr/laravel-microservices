<?php
namespace App\Http\Requests;

use Beethoven\Http\Request;

class ArmazemRequestGet extends Request
{

    protected function rulesResponse(){

        $rule['SBW_ID'] = array(
            "NAME" => "SBW_ID",
            "GROUP" => "SBW",
            "ALIAS" => "id"
        );
        $rule['SBW_Desc'] = array(
            "GROUP" => "SBW",
            "ALIAS" => "descricao",
            "ORDER"=> true,
        );
        $rule['SBW_DisponivelVenda'] = array(
            "GROUP" => "SBW",
            "ALIAS" => "DisponivelVenda",
            "ORDER"=> true,
        );
        $rule['SBW_CRIADOR'] = array(
            "GROUP" => "SBW",
            "ALIAS" => "idCriador",
            "ORDER"=> true,
        );
        $rule['SBW_ALTERADOR'] = array(
            "GROUP" => "SBW",
            "ALIAS" => "idAlterador",
            "ORDER"=> true,
        );
        $rule['SBW_IDEA1'] = array(
            "GROUP" => "SBW",
            "ALIAS" => "idEmpresa",
            "ORDER"=> true,
        );
        return $rule;
    }
    
}
