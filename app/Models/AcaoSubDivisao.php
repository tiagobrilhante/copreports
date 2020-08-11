<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcaoSubDivisao extends Model
{
    use SoftDeletes;

    protected $table = 'acao_sub_divisoes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $fillable = [
        'sub_divisao',
        'acao_id',
        'cor'

    ];

    public function acao()
    {
        return $this->belongsTo(Acao::class);
    }


}
