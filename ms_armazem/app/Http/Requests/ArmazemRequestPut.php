<?php
namespace App\Http\Requests;

use Beethoven\Http\Request;
use Beethoven\Http\RuleOption;

class ArmazemRequestPut extends Request
{
    protected function rules(){
        
        $rule['SBW_Desc'] = array(
            "ALIAS" => "SBW_Desc",
            "required" => true,
            "TYPE"=> RuleOption::TYPE_STRING,
        );
        $rule['SBW_DisponivelVenda'] = array(
            "ALIAS" => "SBW_DisponivelVenda",
            "TYPE"=> RuleOption::TYPE_STRING,
        );
        
        return $rule;
        
    
    }
   

}