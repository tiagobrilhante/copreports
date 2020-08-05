<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOmRequest;
use App\Models\MissaoEmprego;
use App\Models\Om;
use Auth;
use Illuminate\Database\Eloquent\Builder;


class RelatorioTipoController extends Controller
{
    public function index()
    {

        $missoesEmprego = MissaoEmprego::all()->load('subItens');

        return view('insideApp.reportsmanager.index', compact('missoesEmprego'));
    }



}
