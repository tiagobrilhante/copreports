<?php

namespace App\Models\Resultados\Apreensao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApreensaoItem extends Model
{
    use SoftDeletes;

    protected $table = 'apreensao_itens';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $fillable = [
        'nome',
        'apreensao_categoria_id',
        'forma_medir',
        'cor'

    ];


    public function resultadoApreensao()
    {
        return $this->belongsTo(ResultadoApreensao::class);
    }

    public function categoria()
    {
        return $this->belongsTo(ApreensaoCategoria::class);
    }
}
