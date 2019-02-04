<?php
namespace App\Http\Requests;

use Beethoven\Http\Request;

class ArmazemRequestRemove extends Request
{
    protected function rules(){
        
        $rule['SBW_ID'] = array(
            "ALIAS" => "SBW_ID"
        );
        
        return $rule;
    
    }
   
    protected function rulesResponse(){
        
        $rule['ID_RETURN'] = array(
            "NAME" => "ID_RETURN",
            "ALIAS" => "ID_RETURN"
        );
        
        return $rule;
        
    }
}