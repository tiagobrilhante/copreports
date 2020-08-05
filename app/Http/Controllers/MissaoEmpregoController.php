<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMissaoEmpregoRequest;
use App\Models\MissaoEmprego;
use App\Models\MissaoEmpregoSubItens;
use Auth;
use Illuminate\Database\Eloquent\Builder;


class MissaoEmpregoController extends Controller
{
    public function index()
    {

        $missoesEmprego = MissaoEmprego::all()->load('subItens');

        return view('insideApp.reportsmanager.index', compact('missoesEmprego'));
    }

    // cria uma nova missão de emprego
    public function store(StoreMissaoEmpregoRequest $request)
    {

        $missao = $request['missao'];
        $cor = corAleatoria();

        $missaoEmprego = MissaoEmprego::create([
            'missao' => $missao,
            'cor' => $cor

        ]);

        if (count($request['subitens']) > 0) {

            for ($i = 0; $i < count($request['subitens']); $i++) {

                MissaoEmpregoSubItens::create([
                    'sub_item' => $request['subitens'][$i],
                    'cor' => corAleatoria(),
                    'missao_emprego_id' => $missaoEmprego->id
                ]);
            }

        }


        return $missaoEmprego->load('subItens');
    }

    // exclui uma missão de emprego
    public function destroy($id)
    {
        $missaoEmprego = MissaoEmprego::find($id);

        $missaoEmprego->subItens()->delete();

        $missaoEmprego->delete();
    }


}
