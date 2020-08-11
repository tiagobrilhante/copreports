<?php

namespace App\Http\Controllers\Resultados\Apreensoes;


use App\Http\Controllers\Controller;
use App\Models\Resultados\Apreensao\ApreensaoCategoria;
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




}
