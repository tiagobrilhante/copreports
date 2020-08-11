<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acao extends Model
{
    use SoftDeletes;

    protected $table = 'acoes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $fillable = [
        'acao',
        'cor'

    ];

    public function subDivisao()
    {
        return $this->hasMany(AcaoSubDivisao::class);
    }


}
