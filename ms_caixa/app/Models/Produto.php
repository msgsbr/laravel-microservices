<?php
namespace App\Models;

use Beethoven\Database\Orm\Model;

/**
 * Class Produto
 *
 * @property int $SB1_ID
 *
 * @package App\Models
 */
class Produto extends Model
{
	protected $table = 'SB1';

    public $primaryKey = 'SB1_ID';
    protected $enterprise = false;
    
    /* public function produtoCaixa(){
        return $this->belongsTo(CaixaProduto::class,'CX_SB1_IDSB1');
    } */
}
