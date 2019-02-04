<?php

namespace App\Http\Rules;

use Beethoven\Http\RuleOption;
use Beethoven\Rules\Rules;

/**
 * Class EngineAprovacaoProcessosRules
 * @package App\Http\Rules
 */
class EngineAprovacaoAlcadasRules extends Rules
{    
    /**
     * method where all the rules will be written
     * @return $this
     */
    function create()
    {
        
        $this->service()
            ->setTitle('EngineAprovacaoAlcadas');
            //->setModel(ModelsList::class);     
                
        // GET ALL RESPONSE
        $this->response()
            ->getAll()
                ->setPerPageLimit(500)
                ->parameters()
                    ->setName('id')
                        ->setAlias('id')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('alias')
                        ->setAlias('alias')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('alcadas')
                        ->setAlias('alcadas')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('ativo')
                        ->setAlias('ativo')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('fluxo_completo')
                        ->setAlias('fluxo_completo')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('criterio_menor')
                        ->setAlias('criterio_menor')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('OrcAlteraAprovado')
                        ->setAlias('OrcAlteraAprovado')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
        ->done();
        
        // GET RESPONSE
        $this->response()
            ->get()
                ->parameters()
                    ->setName('id')
                        ->setAlias('id')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('alias')
                        ->setAlias('alias')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('alcadas')
                        ->setAlias('alcadas')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('ativo')
                        ->setAlias('ativo')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('fluxo_completo')
                        ->setAlias('fluxo_completo')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('criterio_menor')
                        ->setAlias('criterio_menor')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('OrcAlteraAprovado')
                        ->setAlias('OrcAlteraAprovado')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->field()
                        ->orderly()
                        ->filterable()
        ->done();
        
        // POST REQUEST
        $this->request()
            ->post()
                ->parameters()
                   ->setName('alias')
                        ->setAlias('alias')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->setType(RuleOption::TYPE_STRING)
                        ->required()                        
                    ->setName('alcadas')
                        ->setAlias('alcadas')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->setType(RuleOption::TYPE_STRING)
                        ->required()
                    ->setName('ativo')
                        ->setAlias('ativo')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->setType(RuleOption::TYPE_STRING)
                        ->required()
                    ->setName('fluxo_completo')
                        ->setAlias('fluxo_completo')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->setType(RuleOption::TYPE_STRING)
                        ->required()
                    ->setName('criterio_menor')
                        ->setAlias('criterio_menor')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->setType(RuleOption::TYPE_STRING)
                        ->required()
                    ->setName('OrcAlteraAprovado')
                        ->setAlias('OrcAlteraAprovado')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->setType(RuleOption::TYPE_STRING)
                        ->required()
        ->done();
        
        // POST RESPONSE
        $this->response()
            ->post()
                ->parameters()
                    ->setName('id_return')
                    ->setAlias('message')
                    ->setGroup('EngineAprovacaoAlcadas')
        ->done();
        
        // PUT REQUEST
        $this->request()
            ->put()
                ->parameters()
                    ->setName('alias')
                        ->setAlias('alias')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->setType(RuleOption::TYPE_STRING)
                        ->required()
                    ->setName('alcadas')
                        ->setAlias('alcadas')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->setType(RuleOption::TYPE_STRING)
                        ->required()
                    ->setName('ativo')
                        ->setAlias('ativo')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->setType(RuleOption::TYPE_STRING)
                        ->required()
                    ->setName('fluxo_completo')
                        ->setAlias('fluxo_completo')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->setType(RuleOption::TYPE_STRING)
                        ->required()
                    ->setName('criterio_menor')
                        ->setAlias('criterio_menor')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->setType(RuleOption::TYPE_STRING)
                        ->required()
                    ->setName('OrcAlteraAprovado')
                        ->setAlias('OrcAlteraAprovado')
                        ->setGroup('EngineAprovacaoAlcadas')
                        ->setType(RuleOption::TYPE_STRING)
                        ->required()
        ->done();
        
        // PUT RESPONSE
        $this->response()
            ->put()
                ->parameters()
                    ->setName('id_return')
                    ->setAlias('message')
                    ->setGroup('EngineAprovacaoAlcadas')
        ->done();
        
        // DELETE RESPONSE
        $this->response()
            ->delete()
                ->parameters()
                    ->setName('id_return')
                    ->setAlias('message')
                    ->setGroup('EngineAprovacaoAlcadas')
        ->done();
        
        return $this;
    }
}