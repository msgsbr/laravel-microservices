<?php
namespace App\Models;

use Beethoven\Database\Orm\Model;

/**
 * Class Armazem
 *
 * @property int $SBW_ID
 * @property string $SBW_DESC
 *
 * @package App\Models
 */
class Armazem extends Model
{
    protected $table = 'SBW';

    public $incrementing = TRUE;

    public $timestamps = false;

    public $primaryKey = 'SBW_ID';
    
    protected $fillable = [
        'SBW_ID',
        'SBW_Desc',
        'SBW_IDEA1',
        'SBW_DisponivelVenda',
        'SBW_CRIADOR',
        'SBW_ALTERADOR'
       
    ];

}
