<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMissaoEmpregoRequest;
use App\Http\Requests\UpdateMissaoEmpregoRequest;
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

        if (!in_array(null, $request['subitens'])) {

            for ($i = 0; $i < count($request['subitens']); $i++) {

                MissaoEmpregoSubItens::create([
                    'sub_item' => $request['subitens'][$i],
                    'cor' => corAleatoria(),
                    'missao_emprego_id' => $missaoEmprego->id
                ]);
            }

        }

        //return json_encode($missaoEmprego->load('subItens'));
        return $missaoEmprego->load('subItens');

    }

    // exclui uma missão de emprego
    public function destroy($id)
    {
        $missaoEmprego = MissaoEmprego::find($id);

        $missaoEmprego->subItens()->delete();

        $missaoEmprego->delete();
    }

    // retorna dados de uma missão
    public function show($id)
    {
        $missaoEmprego = MissaoEmprego::find($id);

        return $missaoEmprego->load('subItens');
    }

    // update uma Missão de emprego
    public function update(UpdateMissaoEmpregoRequest $request, $id)
    {
        $me = MissaoEmprego::find($id);

        $me->update([
            'missao' => $request['missao'],
            'cor' => $request['cor'],
        ]);

        // atualiza os si já existentes
        if (!in_array(null, $request['si_id_editada'])) {

            for ($i = 0; $i < count($request['si_id_editada']); $i++) {

                $si_update = MissaoEmpregoSubItens::find($request['si_id_editada'][$i]);

                $si_update->sub_item = $request['si_editada'][$i];
                $si_update->cor = $request['si_cor_editada'][$i];

                $si_update->save();

            }

        }

        // cria os novos SI recebidos
        if (!in_array(null, $request['novas_si'])) {
            for ($i = 0; $i < count($request['novas_si']); $i++) {

                MissaoEmpregoSubItens::create([
                    'sub_item' => $request['novas_si'][$i],
                    'cor' => corAleatoria(),
                    'missao_emprego_id' => $me->id,

                ]);

            }
        }

        return $me->load('subItens');

    }

}
