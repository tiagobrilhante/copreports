<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTipo extends Model
{

    protected $table = 'user_tipo';

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $fillable = [
        'tipo',
        'user_id',
        'created_at',
        'updated_at',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }



}
