<?php
namespace App\Models;

use Beethoven\Database\Orm\Model;

/**
 * Class Caixa
 *
 * @property int $CX_ID
 * @property string $CX_DESC
 *
 * @package App\Models
 */
class Caixa extends Model
{

    protected $table = 'CX';

    public $primaryKey = 'CX_ID';
    //protected $enterprise = false;
    
    /**protected $casts = [
        'CX_ID' => 'int'
    ];*/

    /**
     * Ele é uma espécie de black-list dos valores cuja atribuição você não quer permitir via mass-assignment.
     * Um bom caso de uso para o $guarded seria impedir que o usuário altere o id de seu modelo
     * @var array
     */
    /*protected $guarded = [
        'CX_ID'
    ];*/

    /** Mass Assignment. Desta forma conseguimos criar um registro, passando todos os dados de uma sé vez.
     * Porém, se nãoo adicionarmos os campos fillables, no model, o Laravel bloqueia este tipo de atividade */
    protected $fillable = [
        'CX_ID',
        'CX_DESC',
        'CX_IDEA1',
        'CX_CRIADOR',
        'CX_ALTERADOR',
        'CX_LARGURA_EXTERNA',
        'CX_COMPRIMENTO_EXTERNO',
        'CX_TIPO',
        'CX_STATUS'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function caixaProduto()
    {
        return $this->hasMany(CaixaProduto::class,'CX_SB1_IDCX');
    }
    
    public function produto(){
        return $this->hasMany(Produto::class, 'SB1_ID');
    }
    
}
