<?php

namespace App\Http\Controllers\Resultados\Apreensoes;


use App\Http\Controllers\Controller;
use App\Http\Requests\Resultados\Apreensoes\UpdateCategoriaRequest;
use App\Models\Resultados\Apreensao\ApreensaoCategoria;
use App\Models\Resultados\Apreensao\ApreensaoItem;
use Auth;
use Illuminate\Database\Eloquent\Builder;


class ApreensaoCategoriaController extends Controller
{

    public function index()
    {
        return 'index';
    }

    // lista as categorias
    public function listaTodos()
    {
        return ApreensaoCategoria::all()->load('itens');

    }

    // exclui uma categoria
    public function destroy($id)
    {

        $categoria = ApreensaoCategoria::find($id);

        $categoria->itens()->delete();

        $categoria->delete();


    }

    // retorna dados de uma categoria
    public function show($id)
    {
        $categoria= ApreensaoCategoria::find($id);

        return $categoria->load('itens');
    }


    // update uma categoria
    public function update(UpdateCategoriaRequest $request, $id)
    {

        $categoria = ApreensaoCategoria::find($id);

        $categoria->update([
            'nome' => $request['nome'],
            'cor' => $request['cor'],
        ]);

        // atualiza os itens já existentes
        if (!in_array(null, $request['old_itens'])) {

            for ($i = 0; $i < count($request['old_itens']); $i++) {

                $item_update = ApreensaoItem::find($request['old_itens'][$i][0]);
                $item_update->nome = $request['old_itens'][$i][1];
                $item_update->forma_medir = $request['old_itens'][$i][2];
                $item_update->cor = $request['old_itens'][$i][3];
                $item_update->save();

            }

        }

        // cria os novos itens recebidos
        if (!in_array(null, $request['novos_itens'])) {
            for ($i = 0; $i < count($request['novos_itens']); $i++) {

                ApreensaoItem::create([
                    'nome' => $request['novos_itens'][$i][0],
                    'forma_medir' => $request['novos_itens'][$i][1],
                    'cor' => $request['novos_itens'][$i][2],
                    'apreensao_categoria_id' => $categoria->id,

                ]);

            }
        }

        return $categoria->load('itens');

    }

}
