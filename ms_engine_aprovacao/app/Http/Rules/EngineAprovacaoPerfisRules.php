<?php

namespace App\Http\Rules;

use Beethoven\Http\RuleOption;
use Beethoven\Rules\Rules;

/**
 * Class EngineAprovacaoProcessosRules
 * @package App\Http\Rules
 */
class EngineAprovacaoPerfisRules extends Rules
{    
    /**
     * method where all the rules will be written
     * @return $this
     */
    function create()
    {
        
        $this->service()
            ->setTitle('EngineAprovacaoPerfis');
            //->setModel(ModelsList::class);     
                
        // GET ALL RESPONSE
        $this->response()
            ->getAll()
                ->setPerPageLimit(500)
                ->parameters()
                    ->setName('MN2_ID')
                        ->setAlias('id')
                        ->setGroup('EngineAprovacaoPerfis')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('MN2_Desc')
                        ->setAlias('descricao')
                        ->setGroup('EngineAprovacaoPerfis')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('MN2_Admin')
                        ->setAlias('administrador')
                        ->setGroup('EngineAprovacaoPerfis')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('MN2_CRIADOR')
                        ->setAlias('criador')
                        ->setGroup('EngineAprovacaoPerfis')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('MN2_ALTERADOR')
                        ->setAlias('alterador')
                        ->setGroup('EngineAprovacaoPerfis')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('MN2_STATUS')
                        ->setAlias('status')
                        ->setGroup('EngineAprovacaoPerfis')
                        ->field()
                        ->orderly()
                        ->filterable()
                    ->setName('MN2_Nivel')
                        ->setAlias('nivel')
                        ->setGroup('EngineAprovacaoPerfis')
                        ->field()
                        ->orderly()
                        ->filterable()
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
        
        // PUS REQUEST
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