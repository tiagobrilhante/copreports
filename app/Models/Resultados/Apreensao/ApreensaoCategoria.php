<?php

namespace App\Models\Resultados\Apreensao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApreensaoCategoria extends Model
{
    use SoftDeletes;

    protected $table = 'apreensao_categorias';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $fillable = [
        'nome',
        'cor'

    ];

    public function resultadoApreensao()
    {
        return $this->belongsTo(ResultadoApreensao::class);
    }

    public function itens()
    {
        return $this->hasMany(ApreensaoItem::class);
    }


}
