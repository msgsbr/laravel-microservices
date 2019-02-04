<?php
namespace App\Http\Requests;

use Beethoven\Http\Request;
use Beethoven\Http\RuleOption;

class CaixaProdutoRequestDelete extends Request
{

    protected function rules()
    {
        $rule['CX_ID'] = array(
            "NAME" => "CX_SB1_ID",
            "ALIAS" => "id"
        );
        
        return $rule;
    }

    protected function rulesResponse()
    {
        return array();
        
        $rule['CX_ID'] = array(
            "NAME" => "CX_SB1_ID",
            "ALIAS" => "id"
        );
        
        return $rule;
    }
}

