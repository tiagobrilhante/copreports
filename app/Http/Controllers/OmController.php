<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOmRequest;
use App\Models\Om;
use Auth;
use Illuminate\Database\Eloquent\Builder;


class OmController extends Controller
{
    public function index()
    {
        return view('insideApp.ommanager.index');
    }

    // lista as om para montar options em selects
    public function listaSimples()
    {
        return Om::select('id', 'sigla')->get();

    }

    // lista as om para montar o orgchart
    public function listaOms()
    {
        return Om::all();
    }

    // exclui uma om
    public function destroy($om)
    {

        $om = Om::find($om);

        if ($om->parent == 0) {
            return 'erro_Não é permitido deletar a Om primária!';
        } else {
            $om->delete();
            return 'sucesso';
        }

    }

    // update uma Om
    public function update(UpdateOmRequest $request, $om)
    {

        // aqui eu tento encontrar a OM a se atualizada
        //se ela não existe ainda, tenho que criar
        //  se ela existe devo atualizar...

        if (Om::find($om) == '') {

            // crio uma nova

            $name = $request['name'];
            $sigla = $request['sigla'];
            $cor = $request['cor'];
            $podeVerTudo = $request['podeVerTudo'];
            $podeCriarRelatorio = $request['podeCriarRelatorio'];
            $podeHomologarRelatorio = $request['podeHomologarRelatorio'];
            $podeCriarMaster = $request['podeCriarMaster'];
            $novoNo = false;
            $parent = $request['parent'];
            $om_id = $request['om_id'];

            $om = Om::create([
                'name' => $name,
                'sigla' => $sigla,
                'cor' => $cor,
                'podeVerTudo' => $podeVerTudo,
                'podeCriarRelatorio' => $podeCriarRelatorio,
                'podeHomologarRelatorio' => $podeHomologarRelatorio,
                'podeCriarMaster' => $podeCriarMaster,
                'novoNo' => $novoNo,
                'parent' => $parent,
                'om_id' => $om_id,
            ]);

        } else {

            // atualizo
            $om = Om::find($om);


            $name = $request['name'];
            $sigla = $request['sigla'];
            $cor = $request['cor'];
            $podeVerTudo = $request['podeVerTudo'];
            $podeCriarRelatorio = $request['podeCriarRelatorio'];
            $podeHomologarRelatorio = $request['podeHomologarRelatorio'];
            $podeCriarMaster = $request['podeCriarMaster'];
            $novoNo = false;
            $parent = $request['parent'];
            if ($request['om_id'] == null){

                $om_id = null;

            } else {

                $om_id = $parent;
            }

            $om->name = $name;
            $om->sigla = $sigla;
            $om->cor = $cor;
            $om->podeVerTudo = $podeVerTudo;
            $om->podeCriarRelatorio = $podeCriarRelatorio;
            $om->podeHomologarRelatorio = $podeHomologarRelatorio;
            $om->podeCriarMaster = $podeCriarMaster;
            $om->parent = $parent;
            $om->om_id = $om_id;
            $om->save();

        }

        return $om;
    }

    //lista direcionada
    public function omDirecionada()
    {

            $om = Om::whereHas('user', function (Builder $query) {
                $query->where('om_id', Auth::user()->om->id);
            })->get();

            return $om->load('om');

    }

    // lista os tipos de usuários de acordo com a OM
    public function omTypes($id)
    {

        // tem que verificar se é pef ou não
        $om = Om::find($id);

        $array_de_tipos = ['Administrador','Visualizador'];

        if ($om->podeCriarRelatorio){

            array_push($array_de_tipos, 'Relator');

        }

        if ($om->podeHomologarRelatorio){

            array_push($array_de_tipos, 'Homologador');

        }

        if ($om->podeCriarMaster){

            array_push($array_de_tipos, 'Master');

        }



        return $array_de_tipos;

    }

}
