<?php

namespace App\Http\Rules;

use Beethoven\Http\RuleOption;
use Beethoven\Rules\Rules;


/**
 * Class Caixa
 * @package App\Http\Rules
 */
class CaixaRules extends Rules{
    
    /**
     * method where all the rules will be written
     * @return $this
     */
    function create() {
        
        $this->service()
        ->setTitle('Caixa')
        ->setModel('teste');
        
        
        $this->response()
        ->get()
        ->parameters()
        ->setName('CX_ID')->setAlias('id')->setGroup('Caixa')->field()
        ->setName('CX_DESC')->setGroup('Caixa')->field()
        ->setName('CX_LARGURA_EXTERNA')->setAlias('larguraExterna')->field()
        ->setName('CX_COMPRIMENTO_EXTERNO')->setAlias('comprimentoExterno')->field()
        ->done();
        
        $this->response()
        ->getAll()
        ->setPerPageLimit(500)
        ->parameters()
        ->setName('CX_ID')->setAlias('id')->setGroup('Caixa')->field()->orderly()->filterable()
        ->setName('CX_DESC')->setAlias('descricao')->setGroup('Caixa')->field()->orderly()->filterable()
        ->setName('CX_LARGURA_EXTERNA')->setAlias('larguraExterna')->setGroup('Caixa')->field()
        ->setName('CX_COMPRIMENTO_EXTERNO')->setAlias('comprimentoExterno')->setGroup('Caixa')->field()
        ->done();
        
        $this->request()
        ->post()
        ->parameters()
        ->setName('CX_DESC')->setAlias('descricao')->setGroup('Caixa')->setType(RuleOption::TYPE_STRING)->required()->setMin(3)->setMax(10)
        ->setName('CX_LARGURA_EXTERNA')->setAlias('larguraExterna')->setGroup('Caixa')->required()->setType(RuleOption::TYPE_INTEGER)->setDefault('larguraExternaDefault')
        ->setName('CX_COMPRIMENTO_EXTERNO')->setAlias('comprimentoExterno')->setGroup('Caixa')->setType(RuleOption::TYPE_INTEGER)->setDefault('comprimentoExternoDefault')
        ->done();
        
        $this->response()
        ->post()
        ->parameters()
        ->setName('id_return')->setAlias('id')->setGroup('Caixa')
        ->done();
        
        $this->request()
        ->put()
        ->parameters()
        ->setName('CX_DESC')->required()->setAlias('descricao')->setGroup('Caixa')->setType(RuleOption::TYPE_STRING)
        ->setName('CX_LARGURA_EXTERNA')->required()->setAlias('larguraExterna')->setGroup('Caixa')->setType(RuleOption::TYPE_INTEGER)->setDefault('larguraDefault')
        ->setName('CX_COMPRIMENTO_EXTERNO')->required()->setAlias('comprimentoExterno')->setGroup('Caixa')->setType(RuleOption::TYPE_INTEGER)->setDefault('comprimentoDefault')
        ->done();
        
        $this->response()
        ->put()
        ->parameters()
        ->setName('id_return')->setAlias('id')->setGroup('Caixa')
        ->done();
        
        return $this;
    }
}