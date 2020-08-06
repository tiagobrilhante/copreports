<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MissaoEmpregoSubItens extends Model
{
    use SoftDeletes;

    protected $table = 'missoes_emprego_sub_itens';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $fillable = [
        'sub_item',
        'missao_emprego_id',
        'cor'

    ];

    public function me()
    {
        return $this->belongsTo(MissaoEmprego::class,'missao_emprego_id');
    }


}
