<?php

namespace App\Http\Controllers;

use App\Models\AcaoSubDivisao;
use Auth;
use Illuminate\Database\Eloquent\Builder;


class AcaoSubDivisaoController extends Controller
{

    // exclui um sub item de missão de emprego
    public function destroy($id)
    {
        $subdivisao = AcaoSubDivisao::find($id);

        $subdivisao->delete();
    }

}
