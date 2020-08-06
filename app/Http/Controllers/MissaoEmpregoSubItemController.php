<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMissaoEmpregoRequest;
use App\Http\Requests\UpdateMissaoEmpregoRequest;
use App\Models\MissaoEmprego;
use App\Models\MissaoEmpregoSubItens;
use Auth;
use Illuminate\Database\Eloquent\Builder;


class MissaoEmpregoSubItemController extends Controller
{




    // exclui um sub item de missão de emprego
    public function destroy($id)
    {
        $subitem = MissaoEmpregoSubItens::find($id);

        $subitem->delete();
    }



}
