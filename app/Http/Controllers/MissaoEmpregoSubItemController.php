<?php

namespace App\Http\Controllers;

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
