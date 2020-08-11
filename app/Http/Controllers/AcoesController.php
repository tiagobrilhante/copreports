<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcaoRequest;
use App\Http\Requests\UpdateAcaoRequest;
use App\Models\Acao;
use App\Models\AcaoSubDivisao;
use Auth;
use Illuminate\Database\Eloquent\Builder;


class AcoesController extends Controller
{

    // cria uma nova Ação
    public function store(StoreAcaoRequest $request)
    {

        $acao = $request['acao'];
        $cor = corAleatoria();

        $createdAcao = Acao::create([
            'acao' => $acao,
            'cor' => $cor
        ]);

        if (!in_array(null, $request['subdivisao'])) {

            for ($i = 0; $i < count($request['subdivisao']); $i++) {

                AcaoSubDivisao::create([
                    'sub_divisao' => $request['subdivisao'][$i],
                    'cor' => corAleatoria(),
                    'acao_id' => $createdAcao->id
                ]);
            }

        }

        return $createdAcao->load('subDivisao');

    }

    // exclui uma acao
    public function destroy($id)
    {
        $acao = Acao::find($id);

        $acao->subDivisao()->delete();

        $acao->delete();
    }

    // retorna dados de uma acao
    public function show($id)
    {
        $acao= Acao::find($id);

        return $acao->load('subDivisao');
    }

    // update uma acao
    public function update(UpdateAcaoRequest $request, $id)
    {
        $acao = Acao::find($id);

        $acao->update([
            'acao' => $request['acao'],
            'cor' => $request['cor'],
        ]);

        // atualiza as sub divisões já existentes
        if (!in_array(null, $request['sd_id_editada'])) {

            for ($i = 0; $i < count($request['sd_id_editada']); $i++) {

                $sd_update = AcaoSubDivisao::find($request['sd_id_editada'][$i]);

                $sd_update->sub_divisao = $request['sd_editada'][$i];
                $sd_update->cor = $request['sd_cor_editada'][$i];

                $sd_update->save();

            }

        }

        // cria as novas sub divisões recebidos
        if (!in_array(null, $request['novas_sd'])) {
            for ($i = 0; $i < count($request['novas_sd']); $i++) {

                AcaoSubDivisao::create([
                    'sub_divisao' => $request['novas_sd'][$i],
                    'cor' => corAleatoria(),
                    'acao_id' => $acao->id,

                ]);

            }
        }

        return $acao->load('subDivisao');

    }

}
