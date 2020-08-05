<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MissaoEmprego extends Model
{
    use SoftDeletes;

    protected $table = 'missoes_emprego';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $fillable = [
        'missao',
        'cor'

    ];

    public function subItens()
    {
        return $this->hasMany(MissaoEmpregoSubItens::class);
    }


}
