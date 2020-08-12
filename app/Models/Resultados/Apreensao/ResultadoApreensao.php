<?php

namespace App\Models\Resultados\Apreensao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResultadoApreensao extends Model
{
    use SoftDeletes;

    protected $table = 'resultado_apreensoes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $fillable = [
        'item_categoria_id',
        'item_apreendido_id',
        'quantidade',
        'data_apreensao',
        'quem_apreendeu',
        'observacao',
        'motivo',
        'cor'

    ];


    public function categoria()
    {
        return $this->belongsTo(ApreensaoCategoria::class);
    }

    public function item()
    {
        return $this->belongsTo(ApreensaoItem::class);
    }


}
