<?php
namespace App\Models;

use Beethoven\Database\Orm\Model;

/**
 * Class ProdutoInterface
 *
 * @property int $CX_SB1_ID
 * @package App\Models
 */
class CaixaProduto extends Model
{

    protected $table = 'CX_SB1';
    public $primaryKey = 'CX_SB1_ID';
    protected $enterprise = false;

    /**protected $casts = [
        'CX_SB1_ID' => 'int'
    ];*/

    protected $fillable = [
        'CX_SB1_ID',
        'CX_SB1_IDSB1',
        'CX_SB1_IDCX',
        'CX_SB1_IDEA1',
        'CX_SB1_QUANTIDADE_MAXIMA',
        'CX_SB1_QUANTIDADE_MINIMA'
    ];

    /* public function caixa(){
        return $this->belongsTo(Caixa::class,'CX_ID');
    } */
}
