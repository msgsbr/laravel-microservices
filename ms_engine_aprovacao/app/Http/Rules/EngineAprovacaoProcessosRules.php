<?php

namespace App\Http\Rules;

use Beethoven\Http\RuleOption;
use Beethoven\Rules\Rules;

/**
 * Class EngineAprovacaoProcessosRules
 * @package App\Http\Rules
 */
class EngineAprovacaoProcessosRules extends Rules
{    
    /**
     * method where all the rules will be written
     * @return $this
     */
    function create()
    {
        
        $this->service()
            ->setTitle('EngineAprovacaoProcessos');
            //->setModel(ModelsList::class);
        
        // GET ALL RESPONSE
        $this->response()
            ->getAll()
                ->setPerPageLimit(500)
                    ->parameters()
                        ->setName('PROCESSOS')
                            ->setAlias('tipo')
                            ->setGroup('Regra_aprovacao')
                            ->field()
                            ->orderly()
                            ->filterable()
                        ->setName('PROCESSOS_DESC')
                            ->setAlias('descricao')
                            ->setGroup('Regra_aprovacao')
                            ->field()
                            ->orderly()
                            ->filterable()
                        ->setName('PROCESSOS_METODO_VALOR')
                            ->setAlias('metodo_valor')
                            ->setGroup('Regra_aprovacao')
                            ->field()
        ->done();

        // GET RESPONSE
        $this->response()
            ->get()
                ->parameters()
        ->done();
        
        // POST REQUEST
        $this->request()
            ->post()
                ->parameters()
        ->done();
        
        // POST RESPONSE
        $this->response()
            ->post()
                ->parameters()
        ->done();
        
        // PUT REQUEST
        $this->request()
            ->put()
                ->parameters()
        ->done();
        
        // PUT RESPONSE
        $this->response()
            ->put()
                ->parameters()
        ->done();
        
        return $this;
    }
}