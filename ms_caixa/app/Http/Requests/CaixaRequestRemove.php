<?php
namespace App\Http\Requests;

use Beethoven\Http\Request;
use Beethoven\Http\RuleOption;

class CaixaRequestRemove extends Request
{

    protected function rules(){
        
        $rule['CX_ID'] = array(
            "ALIAS" => "CX_ID"
        );
       
        return $rule;
        
    }
    
    protected function rulesResponse(){
        return array();
        $rule['CX_ID'] = array(
            "NAME" => "CX_ID",
            "ALIAS" => "id"
        );

        return $rule;

    }
}

