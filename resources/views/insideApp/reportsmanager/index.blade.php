@extends('layouts.insideApp.app')

@section('content')

    {{--card--}}
    <div class="card" id="mycard">

        {{--card header--}}
        <div class="card-header">

            <div class="row">


                {{ __('Gerenciamento de Tipos de Relatórios') }}


            </div>

        </div>

        {{--card body--}}
        <div class="card-body">

            {{--tab space--}}
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                {{--Missões de Emprego--}}
                <li class="nav-item" role="presentation">
                    <a class="nav-link active mytabsselect" id="pills-missoesEmprego-tab" data-toggle="pill"
                       href="#pills-missoesEmprego"
                       role="tab"
                       aria-selected="true">Missões de Emprego</a>
                </li>


                {{--Ações Possíveis--}}
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-action-tab" data-toggle="pill" href="#pills-action" role="tab"
                       aria-controls="pills-action" aria-selected="false">Ações Possíveis</a>
                </li>

                {{--Resultados Possíveis--}}
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-result-tab" data-toggle="pill" href="#pills-result" role="tab"
                       aria-controls="pills-result" aria-selected="false">Resultados Possíveis</a>
                </li>

            </ul>

            {{--pills content--}}
            <div class="tab-content" id="pills-tabContent">

                {{--espaço Missões de Emprego--}}
                <div class="tab-pane show active" id="pills-missoesEmprego" role="tabpanel">

                    <div class="alert alert-meu">

                        <h5 id="h5_principal">Missões de emprego cadastradas

                            {{--add new missão de emprego button--}}
                            <button class="btn btn-sm btn-outline-dark ml-5" id="new_missaoEmprego"><i
                                    class="fa fa-plus-circle pr-2"></i>
                                Adicionar nova missão de emprego
                            </button>

                        </h5>

                        @foreach ($missoesEmprego as $missaoEmprego)

                            <div class="alert alert-dark" id="cardMe_{{$missaoEmprego->id}}">

                                <div class="row">

                                    <div class="col-10">

                                        <span class="audiowide"> {{ $missaoEmprego->missao }} </span>
                                        <span class="corbox-normal bordas"
                                              style="background-color: {{ $missaoEmprego->cor }};"></span>
                                        <br>

                                    </div>

                                    <div class="col-2 text-right">

                                        <a href="#" class="link-simples btn_editante"
                                           data-tippy-content="Editar Missão de Emprego"
                                           id="edit_{{$missaoEmprego->id}}"><i class="fa fa-edit"></i></a>

                                        <span class="separaicon"></span>

                                        <a href="#" class="link-simples btn_excludente"
                                           data-tippy-content="Excluir Missão de Emprego"
                                           id="exclude_{{$missaoEmprego->id}}"><i class="fa fa-trash"></i></a>

                                    </div>

                                </div>

                                <div id="les_si_{{$missaoEmprego->id}}"
                                     class="@if(count($missaoEmprego->subItens) == 0) d-none @endif ">

                                    <p>Sub Itens</p>

                                    <div id="list_si_for_index_{{$missaoEmprego->id}}">

                                        <ul>

                                            @foreach($missaoEmprego->subItens as $si)
                                                <li class="lililist_{{$missaoEmprego->id}}"
                                                    id="itemsilist_{{$si->id}}">{{$si->sub_item}} <span class="bola"
                                                                                                        style="background-color: {{ $si->cor }};"></span>
                                                </li>
                                            @endforeach

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

                {{--espaço para ações--}}
                <div class="tab-pane " id="pills-action" role="tabpanel" aria-labelledby="pills-action-tab">

                    <div class="alert alert-meu">

                        <h5 id="h5_principal_acao">Ações possíveis cadastradas

                            {{--add new acao button--}}
                            <button class="btn btn-sm btn-outline-dark ml-5" id="new_acao"><i
                                    class="fa fa-plus-circle pr-2"></i>
                                Adicionar nova ação
                            </button>

                        </h5>

                        @foreach ($acoes as $acao)

                            <div class="alert alert-dark" id="cardAction_{{$acao->id}}">

                                <div class="row">

                                    <div class="col-10">

                                        <span class="audiowide"> {{ $acao->acao }} </span>
                                        <span class="corbox-normal bordas"
                                              style="background-color: {{ $acao->cor }};"></span>
                                        <br>

                                    </div>

                                    <div class="col-2 text-right">

                                        <a href="#" class="link-simples btn_acao_editante"
                                           data-tippy-content="Editar Ação"
                                           id="editAction_{{$acao->id}}"><i class="fa fa-edit"></i></a>

                                        <span class="separaicon"></span>

                                        <a href="#" class="link-simples btn_acao_excludente"
                                           data-tippy-content="Excluir Ação"
                                           id="excludeAction_{{$acao->id}}"><i class="fa fa-trash"></i></a>

                                    </div>

                                </div>

                                <div id="les_sd_{{$acao->id}}"
                                     class="@if(count($acao->subDivisao) == 0) d-none @endif ">

                                    <p>Sub Divisões</p>

                                    <div id="list_sd_for_index_{{$acao->id}}">

                                        <ul>

                                            @foreach($acao->subDivisao as $sd)
                                                <li class="lililistsd_{{$acao->id}}"
                                                    id="itemsilistsd_{{$sd->id}}">{{$sd->sub_divisao}} <span
                                                        class="bola"
                                                        style="background-color: {{ $sd->cor }};"></span>
                                                </li>
                                            @endforeach

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

                {{--espaço para resultados--}}
                <div class="tab-pane " id="pills-result" role="tabpanel" aria-labelledby="pills-result-tab">

                    <div class="alert alert-meu">

                        <h5 id="h5_principal_acao">Resultados Possíveis

                        </h5>

                        <div class="alert alert-dark" id="apreensao_sapce_alert">

                            <div class="row">

                                <div class="col">
                                    <span class="audiowide">Apreensões</span><br>

                                </div>

                                <div class="col text-right">

                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                            id="button_altera_cat_itens_apreensao"><i class="fa fa-edit"></i> Editar
                                        Categorias e Itens
                                    </button>

                                </div>

                            </div>
                            Categorias de itens possíveis e itens:

                            {{--espaçpo para listar--}}
                            <div id="lista_cat_apreensoes" class="row">
                            </div>

                            {{--atributos de apreensões--}}
                            <div class="alert alert-primary">
                                Atributos de apreensões

                                <ul>
                                    <li> Categoria / item apreendido</li>
                                    <li> Quantidade apreendida (com base na forma de medir do item)</li>
                                    <li> Data da Apreensão</li>
                                    <li> Om / Su que apreendeu</li>
                                    <li> Motivo da Apreensão</li>
                                    <li> Observações (SFC)</li>
                                    <li> Cor (Impacta apenas na geração de gráficos)</li>
                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{----------Missão de Emprego------------}}

    {{--modal de cadastrar uma missão de emprego--}}
    <div class="modal fade" id="cadastra_missaoEmprego" tabindex="-1" role="dialog"
         aria-labelledby="cadastra_missaoEmpregoLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                {{--modal header--}}
                <div class="modal-header">

                    <h5 class="modal-title">Cadastramento de Missões de Emprego</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>


                <form id="form_me">

                    {{--modal body--}}
                    <div class="modal-body">

                        {{--explicação geral--}}
                        <div class="row">

                            <div class="col">

                                <div class="alert alert-dark text-justify">

                                    <h3>Sobre o cadastramento de Missões de Emprego</h3>

                                    <p>As missões de emprego são previstas na constituição ou definidas em lei
                                        complementar específica.</p>
                                    <p>Trata-se da base para a criação dos Tipos de Missões que a força poderá executar
                                        a qualquer tempo.</p>

                                    <p>por exemplo: </p>

                                    <ul>
                                        <li>Defesa Externa</li>
                                        <li>GLO</li>
                                        <li>Atribuições Subsidiárias</li>
                                    </ul>

                                </div>

                            </div>

                        </div>

                        {{--input da Missão de emprego--}}
                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="dado_base">Informe a missão de Emprego</label>

                                    <input type="text" class="form-control" id="dado_me"
                                           aria-describedby="dado_me_help" required>

                                    <small id="dado_me_help" class="form-text text-muted">Insira uma
                                        missão de emprego prevista na constituição ou em leis complementares.</small>

                                </div>

                            </div>

                        </div>

                        {{--espaços para sub itens--}}
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-sm btn-outline-dark" id="le_st_button">Adicionar
                                    Sub tipos da Missão
                                    de Emprego
                                </button>
                            </div>
                        </div>

                        <div class="row pt-3 d-none" id="base_st_space">

                            <div class="col">

                                <div class="alert alert-secondary">
                                    <h5>Acrescente os Sub Tipos</h5>

                                    <div class="alert alert-meu d-none" id="base_st_inputs_space">

                                        <div class="row">

                                            <div class="col-11">

                                                <label for="st_me_base">Sub Tipo</label>

                                                <input type="text" class="form-control" id="st_me_base"
                                                       name="st_me_base">

                                            </div>

                                            <div class="col-1 text-center">

                                                <label>Ações</label>

                                                <button type="button" class="btn btn-danger button_exclude_st"
                                                        data-tippy-content="Excluir Sub Tipo"
                                                        id="btn_st_me_base"><i class="fa fa-trash"></i></button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{--modal footer - Buttons--}}
                    <div class="modal-footer">

                        {{--submit--}}
                        <button type="submit" class="btn btn-primary">Cadastrar</button>

                        {{--cancelar--}}
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Cancelar
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    {{--modal de alterar missão de emprego e subitens--}}
    <div class="modal fade" id="altera_me" tabindex="-1" role="dialog"
         aria-labelledby="altera_meLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Alteração de Missão de Emprego - <span class="the_me"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="form_alterar_me">

                    {{--modal body--}}
                    <div class="modal-body">

                        {{--espaço para missão--}}
                        <div class=" alert alert-meu">

                            {{---Missão e cor--}}
                            <div class="row">

                                {{--missão--}}
                                <div class="col-9">

                                    <div class="form-group">

                                        <label for="me_edit">Missão</label>
                                        <input type="text" class="form-control" id="me_edit"
                                               aria-describedby="me_edit_help">

                                        <input type="hidden" id="me_edit_id">


                                        <small id="me_edit_help" class="form-text text-muted">Altere a missão de emprego
                                            se
                                            desejar.</small>

                                    </div>

                                </div>

                                {{--cor--}}
                                <div class="col-3">

                                    <label for="cor_me_edit">Cor</label>
                                    <input type="color" class="form-control" id="cor_me_edit"
                                           aria-describedby="cor_me_edit_help">

                                    <small id="cor_me_edit_help" class="form-text text-muted">Altere a cor da missão de
                                        emprego se desejar.</small>

                                </div>

                            </div>

                        </div>

                        {{--espaço para SI--}}
                        <div class="alert alert-dark">

                            <div class="row">
                                <div class="col-9">
                                    <span class="audiowide">Sub Itens</span>

                                    <button type="button" class="ml-3 btn btn-outline-primary btn-xsm"
                                            id="add_new_si_edit"><i class="fa fa-plus-circle"></i> Adicionar novos Sub
                                        Itens
                                    </button>

                                </div>
                                <div class="col-3 text-right">

                                    <a href="#" class="link-simples btn_si_editante" id="editsi_"><i
                                            class="fa fa-edit" data-tippy-content="Editar Sub Item"></i></a>
                                    <a href="#" class="link-simples btn_si_cancelante d-none" id="cancelsi_"
                                       data-tippy-content="Cancelar a edição de Sub Item"><i
                                            class="fa fa-ban"></i></a>

                                </div>
                            </div>


                            <div class="alert alert-meu text-center pt-3 mt-3" id="no_si_edit">
                                Não existem subitens cadastrados
                            </div>

                            <div id="list_si_for_edit" class="pt-3">

                            </div>

                            <div id="space_for_edit_si_inputs"></div>

                        </div>


                    </div>

                    {{--modal footer--}}
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Alterar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    {{----------Ações------------}}

    {{--modal de cadastrar uma acao --}}
    <div class="modal fade" id="cadastra_acao" tabindex="-1" role="dialog"
         aria-labelledby="cadastra_acaoLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                {{--modal header--}}
                <div class="modal-header">

                    <h5 class="modal-title">Cadastramento de Ação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>


                <form id="form_acao">

                    {{--modal body--}}
                    <div class="modal-body">

                        {{--explicação geral--}}
                        <div class="row">

                            <div class="col">

                                <div class="alert alert-dark text-justify">

                                    <h3>Sobre o cadastramento de Ações</h3>

                                    <p>As ações devem ser deselvolvidas de forma que estejam em acordo com as Missões de
                                        Emprego.</p>
                                    <p>Você deve cadastrar todas as ações possíveis para qualquer tipo de Operação
                                        existente.</p>
                                    <p>Também é possível especificar a ação de forma detalhada através de sus sub
                                        divisões.</p>

                                    <p>por exemplo: </p>

                                    <ul>
                                        <li>Patrulhamento (ação)
                                            <ul>
                                                <li>Terrestre (sub divisão)</li>
                                                <li>Aeromóvel (sub divisão)</li>
                                            </ul>
                                        </li>
                                        <li>Reconhecimento (ação)
                                            <ul>
                                                <li>Naval (sub divisão)</li>
                                                <li>Terrestre (sub divisão)</li>
                                            </ul>
                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                        {{--input da acao--}}
                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="acao_nome">Informe a acao</label>

                                    <input type="text" class="form-control" id="acao_nome"
                                           aria-describedby="acao_nome_help" required>

                                    <small id="acao_nome_help" class="form-text text-muted">Insira a ação
                                        desejada.</small>

                                </div>

                            </div>

                        </div>

                        {{--espaços para sub divisões--}}
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-sm btn-outline-dark" id="le_sd_button">Adicionar
                                    Sub Divisões da Ação
                                </button>
                            </div>
                        </div>

                        <div class="row pt-3 d-none" id="base_sd_space">

                            <div class="col">

                                <div class="alert alert-secondary">
                                    <h5>Acrescente as Sub Divisões</h5>

                                    <div class="alert alert-meu d-none" id="base_sd_inputs_space">

                                        <div class="row">

                                            <div class="col-11">

                                                <label for="sd_acao_base">Sub Divisão</label>

                                                <input type="text" class="form-control" id="sd_acao_base"
                                                       name="sd_acao_base">

                                            </div>

                                            <div class="col-1 text-center">

                                                <label>Opções</label>

                                                <button type="button" class="btn btn-danger button_exclude_sd"
                                                        data-tippy-content="Excluir Sub Divisão"
                                                        id="btn_sd_acao_base"><i class="fa fa-trash"></i></button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{--modal footer - Buttons--}}
                    <div class="modal-footer">

                        {{--submit--}}
                        <button type="submit" class="btn btn-primary">Cadastrar</button>

                        {{--cancelar--}}
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Cancelar
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    {{--modal de alterar acao e subdivisoes--}}
    <div class="modal fade" id="altera_acao" tabindex="-1" role="dialog"
         aria-labelledby="altera_acaoLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Alteração de Ação - <span class="the_acao"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="form_alterar_acao">

                    {{--modal body--}}
                    <div class="modal-body">

                        {{--espaço para acao--}}
                        <div class=" alert alert-meu">

                            {{---acao e cor--}}
                            <div class="row">

                                {{--acao--}}
                                <div class="col-9">

                                    <div class="form-group">

                                        <label for="acao_edit">Ação</label>
                                        <input type="text" class="form-control" id="acao_edit"
                                               aria-describedby="acao_edit_help">

                                        <input type="hidden" id="acao_edit_id">


                                        <small id="acao_edit_help" class="form-text text-muted">Altere a ação se
                                            desejar.</small>

                                    </div>

                                </div>

                                {{--cor--}}
                                <div class="col-3">

                                    <label for="cor_acao_edit">Cor</label>
                                    <input type="color" class="form-control" id="cor_acao_edit"
                                           aria-describedby="cor_acao_edit_help">

                                    <small id="cor_acao_edit_help" class="form-text text-muted">Altere a cor da ação se
                                        desejar.</small>

                                </div>

                            </div>

                        </div>

                        {{--espaço para SD--}}
                        <div class="alert alert-dark">

                            <div class="row">
                                <div class="col-9">
                                    <span class="audiowide">Sub Divisões</span>

                                    <button type="button" class="ml-3 btn btn-outline-primary btn-xsm"
                                            id="add_new_sd_edit"><i class="fa fa-plus-circle"></i> Adicionar novas sub
                                        divisões
                                    </button>

                                </div>
                                <div class="col-3 text-right">

                                    <a href="#" class="link-simples btn_sd_editante" id="editsd_"><i
                                            class="fa fa-edit" data-tippy-content="Editar Sub Divisão"></i></a>
                                    <a href="#" class="link-simples btn_sd_cancelante d-none" id="cancelsd_"
                                       data-tippy-content="Cancelar a edição de Sub Divisão"><i
                                            class="fa fa-ban"></i></a>

                                </div>
                            </div>


                            <div class="alert alert-meu text-center pt-3 mt-3" id="no_sd_edit">
                                Não existem subdivisões cadastrados
                            </div>

                            <div id="list_sd_for_edit" class="pt-3">

                            </div>

                            <div id="space_for_edit_sd_inputs"></div>

                        </div>


                    </div>

                    {{--modal footer--}}
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Alterar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    {{-----------Apreensões----------------}}


    {{--modal de alterar categorias e itens de apreensões--}}
    <div class="modal fade" id="modal_altera_cat_itens_apreensao" tabindex="-1" role="dialog"
         aria-labelledby="altera_cat_itens_apreensaoLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Alteração de Categorias e itens de Apreensões</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="form_alterar_cat_item_apreensao">

                    {{--modal body--}}
                    <div class="modal-body">


                        <div id="lista_cat_apreensoes_edita" class="row">

                        </div>


                    </div>

                    {{--modal footer--}}
                    <div class="modal-footer">
                        <button id="mysubmitbutton_cat_itens" type="submit" class="btn btn-success d-none">Alterar
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>

                    </div>

                </form>

            </div>

        </div>

    </div>



@endsection

@section('myScripts')


    <script>

        $('#mycard').LoadingOverlay("show");

        $(function () {

            //start tippy on load
            tippy('[data-tippy-content]');

            //Function to convert rgb color to hex format
            var hexDigits = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f"];

            function rgb2hex(rgb) {
                rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
                return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
            }

            function hex(x) {
                return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
            }

            //----------- Missões de Emprego --------//

            // abre o modal de cadastro de novas missões de emprego
            $(document).on('click', '#new_missaoEmprego', function (e) {

                e.preventDefault();

                $('#form_me').trigger('reset');

                $('.counter_input').each(function () {

                    $(this).remove();

                });

                $('#base_st_space').addClass('d-none');


                // show modal
                $('#cadastra_missaoEmprego').modal('show');

                // manda o focus para o input
                $('#cadastra_missaoEmprego').on('shown.bs.modal', function () {
                    $('#dado_me').focus();

                })

            });

            // cria uma nova Missão de Emprego
            $(document).on('submit', '#form_me', function (e) {
                e.preventDefault(e);
                let le_su_itens = [''];
                if ($('.le_array_si').length > 0) {
                    le_su_itens = [];
                    for (let i = 0; i < $('.le_array_si').length; i++) {
                        le_su_itens.push($('.le_array_si').eq(i).val());
                    }
                }
                $.ajax({
                    type: 'POST',
                    url: '/memanager',
                    data: {
                        _method: 'POST',
                        _token: $('meta[name=csrf-token]').attr('content'),
                        missao: $('#dado_me').val(),
                        subitens: le_su_itens
                    },
                    success: function (data) {

                        let tem_si = '';
                        let quais_si = '';

                        if (data.sub_itens.length == 0) {

                            tem_si = 'd-none';

                        } else {

                            for (let i = 0; i < data.sub_itens.length; i++) {
                                /// montador de li
                                quais_si += '<li class="lililist_' + data.id + '" id = "itemsilist_' + data.sub_itens[i].id + '" >' + data.sub_itens[i].sub_item + ' <span class="bola" style = "background-color: ' + data.sub_itens[i].cor + ';" > </span></li>';

                            }

                        }

                        let space_for_new_card = '<div class="alert alert-dark" id="cardMe_' + data.id + '">' +
                            '<div class="row">' +
                            '<div class="col-10">' +
                            '<span class="audiowide"> ' + data.missao + ' </span>' +
                            '<span class="corbox-normal bordas" style="background-color: ' + data.cor + ';"></span>' +
                            '<br>' +
                            '</div>' +
                            '<div class="col-2 text-right">' +
                            '<a href="#" class="link-simples btn_editante" data-tippy-content="Editar Missão de  Emprego" id="edit_' + data.id + '"><i class="fa fa-edit"></i></a>' +
                            '<span class="separaicon"></span>' +
                            '<a href="#" data-tippy-content="Excluir Missão de Emprego" class="link-simples btn_excludente" id="exclude_' + data.id + '"><i class="fa fa-trash"></i></a>' +
                            '</div>' +
                            '</div>' +
                            '<div id="les_si_' + data.id + '" class="' + tem_si + '">' +
                            '<p> Sub Itens </p>' +
                            '<div id = "list_si_for_index_' + data.id + '">' +
                            '<ul>' + quais_si +
                            '</ul>' +
                            '</div>' +
                            '</div>' +
                            '</div>';


                        $('#h5_principal').after(space_for_new_card);

                        // alerta de sucesso
                        toastr.success('A missão de emprego foi cadastrada com sucesso!', 'Sucesso!');

                        $('#cadastra_missaoEmprego').modal('hide');

                        //reload tippy
                        tippy('[data-tippy-content]');

                    },
                    error: function (data) {

                        toastr.error('Não foi possível cadastrar a missão de emprego!', 'Falha!');

                    }

                });

            });

            // botao que adiciona subitens
            var contador_lebutton = 0;
            $(document).on('click', '#le_st_button', function (e) {

                e.preventDefault();

                $('#base_st_space').removeClass('d-none');

                var teste = $('#base_st_inputs_space').clone();

                teste.attr('id', 'st_inputs_' + contador_lebutton)
                    .removeClass('d-none').addClass('counter_input')
                    .find('label')
                    .first()
                    .attr('for', 'st_me_' + contador_lebutton)
                    .next()
                    .attr('id', 'st_me_' + contador_lebutton).attr('required', true).addClass('le_array_si')
                    .attr('name', 'st_me[]').parent().next()
                    .find('button').attr('id', 'btnstme_' + contador_lebutton);

                $('#base_st_inputs_space').after(teste);

                $('#st_me_' + contador_lebutton).focus();

                contador_lebutton++;

                //reload tippy
                tippy('[data-tippy-content]');

            });

            // exclui subtipos durante a tela de criação de missões de emprego
            $(document).on('click', '.button_exclude_st', function (e) {

                e.preventDefault();

                let id = $(this).attr('id').split('_')[1];

                $('#st_inputs_' + id).remove();
                $('#st_edit_inputs_' + id).remove();

                var le_inputs_number = $('.counter_input').length;


                if (le_inputs_number == 0) {

                    $('#base_st_space').addClass('d-none');


                    if ($('#list_si_for_edit ul li').length == 0) {

                        $('#no_si_edit').removeClass('d-none');

                    }

                }


            });

            // remove missões de emprego
            $(document).on('click', '.btn_excludente', function (e) {

                e.preventDefault();

                var id = $(this).attr('id').split('_')[1];

                $.confirm({
                    title: 'Você esta certo disso?',
                    content: 'A ação de excluir uma missão de emprego é altamente prejudicial ao sistema! Tenha certeza absoluta do que está fazendo, pois isso vai gerar um enorme impacto em todas as missões e relatórios existentes. Todos os Sub Itens também serão removidos.',
                    buttons: {
                        Confirmar: {
                            action: function () {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: 'POST',
                                    url: '/memanager/' + id,

                                    data: {
                                        _method: 'DELETE',
                                    },
                                    success: function (data) {

                                        $('#cardMe_' + id).remove();

                                        // alerta de sucesso
                                        toastr.success('A missão de emrpego foi removida com sucesso.', 'Sucesso!');

                                    },
                                    error: function () {

                                        // alert de erro
                                        toastr.error('Não foi possível excluir a missão de emprego!', 'Falha!');

                                    }

                                });
                            },
                            btnClass: 'btn-outline-dark'
                        },
                        Cancelar: {
                            btnClass: 'btn-outline-danger'
                        },
                    },
                    columnClass: 'col-md-6'
                });


            });

            // abre o modal de editar me
            $(document).on('click', '.btn_editante', function (e) {

                e.preventDefault();

                var id = $(this).attr('id').split('_')[1];

                $.ajax({
                    type: 'GET',
                    url: '/memanager/' + id,

                    success: function (data) {

                        $('#space_for_edit_si_inputs').empty();
                        $('#list_si_for_edit').empty();

                        $('.the_me').text(data.missao);
                        $('#me_edit').val(data.missao);
                        $('#cor_me_edit').val(data.cor);
                        $('#me_edit_id').val(data.id);

                        $('.btn_si_editante').attr('id', 'editsi_' + data.id);
                        $('.btn_si_cancelante').attr('id', 'cancelsi_' + data.id);


                        if (data.sub_itens.length > 0) {

                            $('#no_si_edit').addClass('d-none');

                            let my_list_si = '<ul>';

                            for (let i = 0; i < data.sub_itens.length; i++) {

                                my_list_si += `<li class="lilieditlist_${data.id}" id="itemsieditli_${data.sub_itens[i].id}">${data.sub_itens[i].sub_item} <span class="bola" style="background-color: ${data.sub_itens[i].cor};"></li>`;

                            }

                            my_list_si += '</ul>';

                            $('#list_si_for_edit').append(my_list_si);

                        } else {

                            $('#no_si_edit').removeClass('d-none')

                        }

                        $('.btn_si_editante').removeClass('d-none');
                        $('.btn_si_cancelante').addClass('d-none');

                        // show modal
                        $('#altera_me').modal('show');
                    },
                    error: function () {

                        // alert de erro
                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                    }

                });

            });

            var le_add_edit_si = 0;
            // adiciona novos inputs de si na tela de edição
            $(document).on('click', '#add_new_si_edit', function (e) {

                e.preventDefault();

                $('#no_si_edit').addClass('d-none');

                var teste = $('#base_st_inputs_space').clone();

                teste.attr('id', 'st_edit_inputs_' + le_add_edit_si)
                    .removeClass('d-none').addClass('counter_input')
                    .find('label')
                    .first()
                    .attr('for', 'st_me_edit_' + le_add_edit_si)
                    .next()
                    .attr('id', 'st_me_edit_' + le_add_edit_si).attr('required', true).addClass('le_array_si_edit')
                    .attr('name', 'st_me_edit[]').parent().next()
                    .find('button').attr('id', 'btnstmeedit_' + le_add_edit_si);


                $('#space_for_edit_si_inputs').append(teste);

                $('#st_me_edit_' + le_add_edit_si).focus();

                le_add_edit_si++;

            });

            // guarda as infortmações iniciais para caso cancele, volta ao normal
            var leinfoinisi = '';

            //ajusta os si para editar
            $(document).on('click', '.btn_si_editante', function (e) {

                e.preventDefault();

                let id_me = $(this).attr('id').split('_')[1];

                var modularinputs = '';

                $('.lilieditlist_' + id_me).each(function () {

                    let tttext = $(this).text();
                    let ideditind = $(this).attr('id').split('_')[1];
                    let coloreditind = rgb2hex($(this).children('span').first().css('background-color'));

                    leinfoinisi += ` <!--ref --> <li class="lilieditlist_${id_me}" id="itemsieditli_${ideditind}">${tttext} <span class="bola" style="background-color: ${coloreditind};"></li>`;

                    modularinputs += '<div class="row" id="inpputttsi_' + ideditind + '">' +
                    '<div class="col-9">' +
                    '<div class="form-group">' +
                    '<input type="text" class="form-control le_olds_si_name" id="me_si_edit_input_' + ideditind + '" value="' + tttext + '">' +
                    '<input type="hidden" class="le_olds_si_id" id="me_si_edit_id_input_' + ideditind + '" value="' + ideditind + '">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<input type="color" class="form-control le_olds_si_color" id="cor_me_edit_input_' + ideditind + '" value="' + coloreditind + '">' +
                    '</div>' +
                    '<div class="col-1">' +
                    '<button data-id="'+id_me+'" type="button" class="btn btn-danger remove_si_edit_window" id="removemesieditinput_' + ideditind + '"><i class="fa fa-trash"></i></button>' +
                    '</div>' +
                    '</div>';

                    });

                $('#list_si_for_edit').empty();

                $('#list_si_for_edit').append(modularinputs);

                $('.btn_si_editante').addClass('d-none');
                $('.btn_si_cancelante').removeClass('d-none');

            });

            // cancela a edição de itens já cadastrados
            $(document).on('click', '.btn_si_cancelante', function (e) {

                e.preventDefault();

                $('#list_si_for_edit').empty();

                $('#list_si_for_edit').append('<ul>' + leinfoinisi + '</ul>');

                $('.btn_si_editante').removeClass('d-none');
                $('.btn_si_cancelante').addClass('d-none');

                leinfoinisi = '';


            });

            //submete alterações
            $(document).on('submit', '#form_alterar_me', function (e) {

                e.preventDefault();

                let id = $('#me_edit_id').val();
                let missao = $('#me_edit').val();
                let cor = $('#cor_me_edit').val();

                let array_novas_si = [''];
                let array_antigas_si_nome_editadas = [''];
                let array_antigas_si_cor_editadas = [''];
                let array_antigas_si_id_editadas = [''];

                if ($('.le_array_si_edit').length > 0) {

                    array_novas_si = [];

                    for (let i = 0; i < $('.le_array_si_edit').length; i++) {

                        array_novas_si.push($('.le_array_si_edit').eq(i).val());

                    }

                }

                if ($('.le_olds_si_name').length > 0) {

                    array_antigas_si_nome_editadas = [];
                    array_antigas_si_cor_editadas = [];
                    array_antigas_si_id_editadas = [];

                    for (let i = 0; i < $('.le_olds_si_name').length; i++) {

                        array_antigas_si_nome_editadas.push($('.le_olds_si_name').eq(i).val());
                        array_antigas_si_cor_editadas.push($('.le_olds_si_color').eq(i).val());
                        array_antigas_si_id_editadas.push($('.le_olds_si_id').eq(i).val());

                    }
                }

                $.ajax({
                    type: 'POST',
                    url: '/memanager/' + id,
                    data: {
                        _method: 'PUT',
                        _token: $('meta[name=csrf-token]').attr('content'),
                        missao: missao,
                        cor: cor,
                        novas_si: array_novas_si,
                        si_editada: array_antigas_si_nome_editadas,
                        si_cor_editada: array_antigas_si_cor_editadas,
                        si_id_editada: array_antigas_si_id_editadas,

                    },

                    success: function (data) {

                        const le_card = $('#cardMe_' + id);

                        le_card.children().children().children().eq(0).text(data.missao);
                        le_card.children().children().children().eq(1).css('background-color', data.cor);

                        $('#list_si_for_index_' + data.id).empty();

                        let listanova = '<ul>';

                        if (data.sub_itens.length > 0) {

                            $('#les_si_' + id).removeClass('d-none');

                            for (let i = 0; i < data.sub_itens.length; i++) {

                                listanova += '<li class="lililist_' + data.id + '" id="itemsilist_' + data.sub_itens[i].id + '">' + data.sub_itens[i].sub_item + ' <span class="bola" style="background-color: ' + data.sub_itens[i].cor + ';"></span></li>';

                            }

                        } else {

                            $('#les_si_' + id).addClass('d-none');

                        }

                        listanova += '</ul>';

                        $('#list_si_for_index_' + data.id).append(listanova);

                        //reload tippy
                        tippy('[data-tippy-content]');

                        toastr.success('Missão de emprego alterada com sucesso!', 'Sucesso!');

                        // hide modal
                        $('#altera_me').modal('hide');

                    },
                    error: function (data) {

                        toastr.error('Não foi possível alterar a missão de emprego!', 'Falha!');

                    }

                });

            });

            // remove um si já existente na janela de edição
            $(document).on('click', '.remove_si_edit_window', function (e) {

                e.preventDefault();
                let id = $(this).attr('id').split('_')[1];
                let id_me = $(this).data('id');

                $.confirm({
                    title: 'Você esta certo disso?',
                    content: 'A ação de excluir uma sub item de missão de emprego é altamente prejudicial ao sistema! Tenha certeza absoluta do que está fazendo, pois isso vai gerar um enorme impacto em todas as missões e relatórios existentes.',
                    buttons: {
                        Confirmar: {
                            action: function () {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: 'POST',
                                    url: '/simemanager/' + id,

                                    data: {
                                        _method: 'DELETE',
                                    },
                                    success: function (data) {

                                        // remove o input
                                        $('#inpputttsi_' + id).remove();

                                        // remove da lista na tela principal
                                        $('#itemsilist_' + id).remove();

                                        // arrumando o cancel
                                        var ajuste = leinfoinisi.split('<!--ref -->');

                                        const coisa = 'id="itemsieditli_' + id + '"';

                                        for (let i = 0; i < ajuste.length; i++) {

                                            if (ajuste[i].indexOf(coisa) != -1) {

                                                ajuste.splice(i, 1);

                                            }

                                        }

                                        leinfoinisi = '';

                                        // reajusta o cancel conforme a nova lista
                                        for (let i = 0; i < ajuste.length; i++) {

                                            leinfoinisi += `${ajuste[i]}`;

                                        }

                                        if ($('#list_si_for_edit ul li').length == 0 && $('#list_si_for_edit .row').length == 0) {

                                            $('#no_si_edit').removeClass('d-none');

                                        }

                                        // alerta de sucesso
                                        toastr.success('O sub item da missão de emprego foi removido com sucesso.', 'Sucesso!');

                                    },
                                    error: function () {

                                        // alert de erro
                                        toastr.error('Não foi possível excluir o sub item da missão de emprego!', 'Falha!');

                                    }

                                });
                            },
                            btnClass: 'btn-outline-dark'
                        },
                        Cancelar: {
                            btnClass: 'btn-outline-danger'
                        },
                    },
                    columnClass: 'col-md-6'
                });


            });


            //--------------------------------------//

            //---------------Ações------------//

            // abre o modal de cadastro de novas acoes
            $(document).on('click', '#new_acao', function (e) {

                e.preventDefault();

                $('#form_acao').trigger('reset');

                $('.counter_input_sd').each(function () {

                    $(this).remove();

                });

                $('#base_acao_space').addClass('d-none');

                // show modal
                $('#cadastra_acao').modal('show');

                // manda o focus para o input
                $('#cadastra_acao').on('shown.bs.modal', function () {
                    $('#acao_nome').focus();

                })

            });

            // botao que adiciona divisoes
            var contador_lebuttonaction = 0;
            $(document).on('click', '#le_sd_button', function (e) {

                e.preventDefault();

                $('#base_sd_space').removeClass('d-none');

                var teste = $('#base_sd_inputs_space').clone();

                teste.attr('id', 'sd_inputs_' + contador_lebuttonaction)
                    .removeClass('d-none').addClass('counter_input_sd')
                    .find('label')
                    .first()
                    .attr('for', 'sd_action_' + contador_lebuttonaction)
                    .next()
                    .attr('id', 'sd_action_' + contador_lebuttonaction).attr('required', true).addClass('le_array_sd')
                    .attr('name', 'sd_action[]').parent().next()
                    .find('button').attr('id', 'btnsdacao_' + contador_lebuttonaction);

                $('#base_sd_inputs_space').after(teste);

                $('#sd_action_' + contador_lebuttonaction).focus();

                contador_lebuttonaction++;

                //reload tippy
                tippy('[data-tippy-content]');

            });

            // exclui sub divisoes durante a tela de criação de acoes
            $(document).on('click', '.button_exclude_sd', function (e) {

                e.preventDefault();

                let id = $(this).attr('id').split('_')[1];

                $('#sd_inputs_' + id).remove();
                $('#sd_edit_inputs_' + id).remove();

                var le_inputs_number_sd = $('.counter_input_sd').length;


                if (le_inputs_number_sd == 0) {

                    $('#base_sd_space').addClass('d-none');


                    if ($('#list_sd_for_edit ul li').length == 0) {

                        $('#no_sd_edit').removeClass('d-none');

                    }

                }


            });

            // cria uma nova Ação
            $(document).on('submit', '#form_acao', function (e) {
                e.preventDefault(e);
                let le_sd_itens = [''];
                if ($('.le_array_sd').length > 0) {
                    le_sd_itens = [];
                    for (let i = 0; i < $('.le_array_sd').length; i++) {
                        le_sd_itens.push($('.le_array_sd').eq(i).val());
                    }
                }
                $.ajax({
                    type: 'POST',
                    url: '/acaomanager',
                    data: {
                        _method: 'POST',
                        _token: $('meta[name=csrf-token]').attr('content'),
                        acao: $('#acao_nome').val(),
                        subdivisao: le_sd_itens
                    },
                    success: function (data) {

                        let tem_sd = '';
                        let quais_sd = '';

                        if (data.sub_divisao.length == 0) {

                            tem_sd = 'd-none';

                        } else {

                            for (let i = 0; i < data.sub_divisao.length; i++) {
                                /// montador de li
                                quais_sd += '<li class="lililistsd_' + data.id + '" id = "itemsilistsd_' + data.sub_divisao[i].id + '" >' + data.sub_divisao[i].sub_divisao + ' <span class="bola" style = "background-color: ' + data.sub_divisao[i].cor + ';" > </span></li>';

                            }

                        }

                        let space_for_new_card_acao = '<div class="alert alert-dark" id="cardAction_' + data.id + '">' +
                            '<div class="row">' +
                            '<div class="col-10">' +
                            '<span class="audiowide"> ' + data.acao + ' </span>' +
                            '<span class="corbox-normal bordas" style="background-color: ' + data.cor + ';"></span>' +
                            '<br>' +
                            '</div>' +
                            '<div class="col-2 text-right">' +
                            '<a href="#" class="link-simples btn_acao_editante" data-tippy-content="Editar Ação" id="editAction_' + data.id + '"><i class="fa fa-edit"></i></a>' +
                            '<span class="separaicon"></span>' +
                            '<a href="#" data-tippy-content="Excluir Missão de Emprego" class="link-simples btn_acao_excludente" id="excludeAction_' + data.id + '"><i class="fa fa-trash"></i></a>' +
                            '</div>' +
                            '</div>' +
                            '<div id="les_sd_' + data.id + '" class="' + tem_sd + '">' +
                            '<p> Sub Divisões </p>' +
                            '<div id = "list_sd_for_index_' + data.id + '">' +
                            '<ul>' + quais_sd +
                            '</ul>' +
                            '</div>' +
                            '</div>' +
                            '</div>';


                        $('#h5_principal_acao').after(space_for_new_card_acao);

                        // alerta de sucesso
                        toastr.success('A Ação foi cadastrada com sucesso!', 'Sucesso!');

                        $('#cadastra_acao').modal('hide');

                        //reload tippy
                        tippy('[data-tippy-content]');

                    },
                    error: function (data) {

                        toastr.error('Não foi possível cadastrar a Ação!', 'Falha!');

                    }

                });

            });

            // remove ação
            $(document).on('click', '.btn_acao_excludente', function (e) {

                e.preventDefault();

                var id = $(this).attr('id').split('_')[1];

                $.confirm({
                    title: 'Você esta certo disso?',
                    content: 'A exclusão de uma ação é altamente prejudicial ao sistema! Tenha certeza absoluta do que está fazendo, pois isso vai gerar um enorme impacto em todas as missões e relatórios existentes. Todoas as Sub Divisões também serão removidas.',
                    buttons: {
                        Confirmar: {
                            action: function () {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: 'POST',
                                    url: '/acaomanager/' + id,

                                    data: {
                                        _method: 'DELETE',
                                    },
                                    success: function (data) {

                                        $('#cardAction_' + id).remove();

                                        // alerta de sucesso
                                        toastr.success('A Ação foi removida com sucesso.', 'Sucesso!');

                                    },
                                    error: function () {

                                        // alert de erro
                                        toastr.error('Não foi possível excluir a Ação!', 'Falha!');

                                    }

                                });
                            },
                            btnClass: 'btn-outline-dark'
                        },
                        Cancelar: {
                            btnClass: 'btn-outline-danger'
                        },
                    },
                    columnClass: 'col-md-6'
                });


            });

            // abre o modal de editar acao
            $(document).on('click', '.btn_acao_editante', function (e) {

                e.preventDefault();

                var id = $(this).attr('id').split('_')[1];

                $.ajax({
                    type: 'GET',
                    url: '/acaomanager/' + id,

                    success: function (data) {

                        $('#space_for_edit_sd_inputs').empty();
                        $('#list_sd_for_edit').empty();

                        $('.the_acao').text(data.acao);
                        $('#acao_edit').val(data.acao);
                        $('#cor_acao_edit').val(data.cor);
                        $('#acao_edit_id').val(data.id);

                        $('.btn_sd_editante').attr('id', 'editsd_' + data.id);
                        $('.btn_sd_cancelante').attr('id', 'cancelsd_' + data.id);


                        if (data.sub_divisao.length > 0) {

                            $('#no_sd_edit').addClass('d-none');

                            let my_list_sd = '<ul>';

                            for (let i = 0; i < data.sub_divisao.length; i++) {

                                my_list_sd += `<li class="lilieditlistsd_${data.id}" id="itemsieditlisd_${data.sub_divisao[i].id}">${data.sub_divisao[i].sub_divisao} <span class="bola" style="background-color: ${data.sub_divisao[i].cor};"></li>`;

                            }

                            my_list_sd += '</ul>';

                            $('#list_sd_for_edit').append(my_list_sd);

                        } else {

                            $('#no_sd_edit').removeClass('d-none')

                        }

                        $('.btn_sd_editante').removeClass('d-none');
                        $('.btn_sd_cancelante').addClass('d-none');

                        // show modal
                        $('#altera_acao').modal('show');
                    },
                    error: function () {

                        // alert de erro
                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                    }

                });

            });

            var le_add_edit_sd = 0;
            // adiciona novos inputs de sd na tela de edição
            $(document).on('click', '#add_new_sd_edit', function (e) {

                e.preventDefault();

                $('#no_sd_edit').addClass('d-none');

                var teste = $('#base_sd_inputs_space').clone();

                teste.attr('id', 'sd_edit_inputs_' + le_add_edit_sd)
                    .removeClass('d-none').addClass('counter_input_sd')
                    .find('label')
                    .first()
                    .attr('for', 'sd_acao_edit_' + le_add_edit_sd)
                    .next()
                    .attr('id', 'sd_acao_edit_' + le_add_edit_sd).attr('required', true).addClass('le_array_sd_edit')
                    .attr('name', 'sd_acao_edit[]').parent().next()
                    .find('button').attr('id', 'btnsdacaoedit_' + le_add_edit_sd);


                $('#space_for_edit_sd_inputs').append(teste);

                $('#sd_acao_edit_' + le_add_edit_sd).focus();

                le_add_edit_sd++;

            });

            // guarda as infortmações iniciais para caso cancele, volta ao normal (acao)
            var leinfoinisd = '';

            //ajusta os sd para editar
            $(document).on('click', '.btn_sd_editante', function (e) {

                e.preventDefault();

                let id_acao = $(this).attr('id').split('_')[1];

                var modularinputssd = '';

                $('.lilieditlistsd_' + id_acao).each(function () {

                    let tttext = $(this).text();
                    let ideditind = $(this).attr('id').split('_')[1];
                    let coloreditind = rgb2hex($(this).children('span').first().css('background-color'));

                    leinfoinisd += `<!--ref --> <li class="lilieditlistsd_${id_acao}" id="itemsdeditli_${ideditind}">${tttext} <span class="bola" style="background-color: ${coloreditind};"></li>`;

                    modularinputssd += '<div class="row" id="inpputttsd_' + ideditind + '">' +
                    '<div class="col-9">' +
                    '<div class="form-group">' +
                    '<input type="text" class="form-control le_olds_sd_name" id="acao_sd_edit_input_' + ideditind + '" value="' + tttext + '">' +
                    '<input type="hidden" class="le_olds_sd_id" id="acao_sd_edit_id_input_' + ideditind + '" value="' + ideditind + '">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<input type="color" class="form-control le_olds_sd_color" id="cor_acao_edit_input_' + ideditind + '" value="' + coloreditind + '">' +
                    '</div>' +
                    '<div class="col-1">' +
                    '<button data-id="'+id_acao+'" type="button" class="btn btn-danger remove_sd_edit_window" id="removemesdeditinput_' + ideditind + '"><i class="fa fa-trash"></i></button>' +
                    '</div>' +
                    '</div>';

                    });

                $('#list_sd_for_edit').empty();

                $('#list_sd_for_edit').append(modularinputssd);

                $('.btn_sd_editante').addClass('d-none');
                $('.btn_sd_cancelante').removeClass('d-none');

            });

            // cancela a edição de itens sd já cadastrados
            $(document).on('click', '.btn_sd_cancelante', function (e) {

                e.preventDefault();

                $('#list_sd_for_edit').empty();

                $('#list_sd_for_edit').append('<ul>' + leinfoinisisd + '</ul>');

                $('.btn_sd_editante').removeClass('d-none');
                $('.btn_sd_cancelante').addClass('d-none');

                leinfoinisisd = '';

            });

            // remove um sd já existente na janela de edição
            $(document).on('click', '.remove_sd_edit_window', function (e) {

                e.preventDefault();
                let id = $(this).attr('id').split('_')[1];
                let id_me = $(this).data('id');

                $.confirm({
                    title: 'Você esta certo disso?',
                    content: 'A ação de excluir uma sub divisão de ação é altamente prejudicial ao sistema! Tenha certeza absoluta do que está fazendo, pois isso vai gerar um enorme impacto em todas as missões e relatórios existentes.',
                    buttons: {
                        Confirmar: {
                            action: function () {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: 'POST',
                                    url: '/sdacaomanager/' + id,

                                    data: {
                                        _method: 'DELETE',
                                    },
                                    success: function (data) {

                                        // remove o input
                                        $('#inpputttsd_' + id).remove();

                                        // remove da lista na tela principal
                                        $('#itemsdlist_' + id).remove();

                                        // arrumando o cancel
                                        var ajustesd = leinfoinisisd.split('<!--ref -->');

                                        const coisasd = 'id="itemsdeditli_' + id + '"';

                                        for (let i = 0; i < ajustesd.length; i++) {

                                            if (ajustesd[i].indexOf(coisasd) != -1) {

                                                ajustesd.splice(i, 1);

                                            }

                                        }

                                        leinfoinisisd = '';

                                        // reajusta o cancel conforme a nova lista
                                        for (let i = 0; i < ajustesd.length; i++) {

                                            leinfoinisisd += `${ajustesd[i]}`;

                                        }

                                        if ($('#list_sd_for_edit ul li').length == 0 && $('#list_sd_for_edit .row').length == 0) {

                                            $('#no_sd_edit').removeClass('d-none');

                                        }

                                        // alerta de sucesso
                                        toastr.success('A sub divisão da ação foi removido com sucesso.', 'Sucesso!');

                                    },
                                    error: function () {

                                        // alert de erro
                                        toastr.error('Não foi possível excluir a sub divisão da ação!', 'Falha!');

                                    }

                                });
                            },
                            btnClass: 'btn-outline-dark'
                        },
                        Cancelar: {
                            btnClass: 'btn-outline-danger'
                        },
                    },
                    columnClass: 'col-md-6'
                });


            });

            //submete alterações acao
            $(document).on('submit', '#form_alterar_acao', function (e) {

                e.preventDefault();

                let id = $('#acao_edit_id').val();
                let acao = $('#acao_edit').val();
                let cor = $('#cor_acao_edit').val();

                let array_novas_sd = [''];
                let array_antigas_sd_nome_editadas = [''];
                let array_antigas_sd_cor_editadas = [''];
                let array_antigas_sd_id_editadas = [''];

                if ($('.le_array_sd_edit').length > 0) {

                    array_novas_sd = [];

                    for (let i = 0; i < $('.le_array_sd_edit').length; i++) {

                        array_novas_sd.push($('.le_array_sd_edit').eq(i).val());

                    }

                }

                if ($('.le_olds_sd_name').length > 0) {

                    array_antigas_sd_nome_editadas = [];
                    array_antigas_sd_cor_editadas = [];
                    array_antigas_sd_id_editadas = [];

                    for (let i = 0; i < $('.le_olds_sd_name').length; i++) {

                        array_antigas_sd_nome_editadas.push($('.le_olds_sd_name').eq(i).val());
                        array_antigas_sd_cor_editadas.push($('.le_olds_sd_color').eq(i).val());
                        array_antigas_sd_id_editadas.push($('.le_olds_sd_id').eq(i).val());

                    }
                }

                $.ajax({
                    type: 'POST',
                    url: '/acaomanager/' + id,
                    data: {
                        _method: 'PUT',
                        _token: $('meta[name=csrf-token]').attr('content'),
                        acao: acao,
                        cor: cor,
                        novas_sd: array_novas_sd,
                        sd_editada: array_antigas_sd_nome_editadas,
                        sd_cor_editada: array_antigas_sd_cor_editadas,
                        sd_id_editada: array_antigas_sd_id_editadas,

                    },

                    success: function (data) {

                        const le_card_sd = $('#cardAction_' + id);

                        le_card_sd.children().children().children().eq(0).text(data.acao);
                        le_card_sd.children().children().children().eq(1).css('background-color', data.cor);

                        $('#list_sd_for_index_' + data.id).empty();

                        let listanovasd = '<ul>';

                        if (data.sub_divisao.length > 0) {

                            $('#les_sd_' + id).removeClass('d-none');

                            for (let i = 0; i < data.sub_divisao.length; i++) {

                                listanovasd += '<li class="lililistsd_' + data.id + '" id="itemsdlist_' + data.sub_divisao[i].id + '">' + data.sub_divisao[i].sub_divisao + ' <span class="bola" style="background-color: ' + data.sub_divisao[i].cor + ';"></span></li>';

                            }

                        } else {

                            $('#les_sd_' + id).addClass('d-none');

                        }

                        listanovasd += '</ul>';

                        $('#list_sd_for_index_' + data.id).append(listanovasd);

                        //reload tippy
                        tippy('[data-tippy-content]');

                        toastr.success('Ação alterada com sucesso!', 'Sucesso!');

                        // hide modal
                        $('#altera_acao').modal('hide');

                    },
                    error: function (data) {

                        toastr.error('Não foi possível alterar a Ação!', 'Falha!');

                    }

                });

            });


            //-----------------------------//

            // -------- RESULTADOS --------//


            // carrega os dados de itens de apreensão
            $(document).on('click', '#pills-result-tab', function (e) {

                e.preventDefault();

                $('#lista_cat_apreensoes').empty();

                $.ajax({
                    type: 'GET',
                    url: '/listacatapre',

                    beforeSend: function () {

                        $('#apreensao_sapce_alert').LoadingOverlay("show");

                    },
                    success: function (data) {

                        console.log(data);

                        for (let i = 0; i < data.length; i++) {

                            let ajusta_itens = '';

                            if (data[i].itens.length > 0) {

                                ajusta_itens = '<ul>';

                                for (let x = 0; x < data[i].itens.length; x++) {

                                    ajusta_itens += `<li>${data[i].itens[x].nome} ( ${data[i].itens[x].forma_medir} ) <span class="bola" style="background-color: ${data[i].itens[x].cor};"></span></li>`;

                                }

                                ajusta_itens += '</ul>';

                            }

                            let crialista = `<div class="col-6"><div class="alert alert-meu"> ${data[i].nome} <span class="corbox-normal bordas"
                                              style="background-color: ${data[i].cor};"></span> <br><br> ${ajusta_itens}</div></div>`;


                            $('#lista_cat_apreensoes').append(crialista);

                        }

                        $('#apreensao_sapce_alert').LoadingOverlay("hide");

                    },
                    error: function (data) {

                        console.log(data);

                        // alert de erro
                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                    },


                });


            });

            var pegaitensliiniapreensao = [];
            var pegacatapreensaoini = [];

            // abre o modal de alterar categorias e itens de aprteensão
            $(document).on('click', '#button_altera_cat_itens_apreensao', function (e) {

                e.preventDefault();

                $('#lista_cat_apreensoes_edita').empty();
                $('#mysubmitbutton_cat_itens').addClass('d-none');

                pegaitensliiniapreensao = [];
                pegacatapreensaoini = [];

                $.ajax({
                    type: 'GET',
                    url: '/listacatapre',

                    success: function (data) {

                        console.log(data);

                        for (let i = 0; i < data.length; i++) {

                            let ajusta_itens = '';

                            if (data[i].itens.length > 0) {

                                ajusta_itens = `<ul id="listalicatitens_${data[i].id}">`;

                                for (let x = 0; x < data[i].itens.length; x++) {

                                    ajusta_itens += `<li id="leitemedit_${data[i].itens[x].id}">${data[i].itens[x].nome} ( ${data[i].itens[x].forma_medir} ) <span class="bola" style="background-color: ${data[i].itens[x].cor};"></span></li>`;

                                }

                                ajusta_itens += '</ul>';

                            }

                            let crialista = `<div class="col-12" id="categora_item_espaco_edit_${data[i].id}">` +
                                `<div class="alert alert-meu">` +
                                `<div class="row">` +
                                `<div class="col-11"> ${data[i].nome} ` +
                                `<span class="corbox-normal bordas" style="background-color: ${data[i].cor};"></span>` +
                                `</div>` +
                                `<div class="col-1 text-right">` +
                                `<a href="#" class="link-simples button_edit_cat" id="editcat_${data[i].id}"><i class="fa fa-edit"></i></a>` +
                                `<span class="separaicon"></span> ` +
                                `<a href="#" class="link-simples button_delete_cat" id="excludecat_${data[i].id}"> <i class="fa fa-trash"></i></a>` +
                                `<a href="#" class="link-simples button_cancel_cat d-none" id="cancelcat_${data[i].id}"> <i class="fa fa-ban"></i></a>` +
                                `</div>` +
                                `</div>` +
                                `<br><br> ${ajusta_itens}</div></div>`;


                            $('#lista_cat_apreensoes_edita').append(crialista);

                        }


                        $('#modal_altera_cat_itens_apreensao').modal('show');

                    },
                    error: function (data) {

                        console.log(data);

                        // alert de erro
                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                    },


                });


            });

            //remove uma categoria de itens apreendidos
            $(document).on('click', '.button_delete_cat', function (e) {

                e.preventDefault();
                let id = $(this).attr('id').split('_')[1];

                $.confirm({
                    title: 'Você esta certo disso?',
                    content: 'A ação de excluir uma categoria é altamente prejudicial ao sistema! Tenha certeza absoluta do que está fazendo, pois isso vai gerar um enorme impacto em todas as missões e relatórios existentes. (todos os itens dessa categoria também serão removidos',
                    buttons: {
                        Confirmar: {
                            action: function () {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: 'POST',
                                    url: '/catapreensao/' + id,

                                    data: {
                                        _method: 'DELETE',
                                    },
                                    success: function () {


                                        $('#categora_item_espaco_edit_' + id).remove();

                                        // alerta de sucesso
                                        toastr.success('A categoria foi removida com sucesso.', 'Sucesso!');

                                    },
                                    error: function () {

                                        // alert de erro
                                        toastr.error('Não foi possível excluir a categoria!', 'Falha!');

                                    }

                                });
                            },
                            btnClass: 'btn-outline-dark'
                        },
                        Cancelar: {
                            btnClass: 'btn-outline-danger'
                        },
                    },
                    columnClass: 'col-md-6'
                });

            });


            // ajusta a edição de categoria e itens
            $(document).on('click', '.button_edit_cat', function (e) {

                e.preventDefault();

                let id = $(this).attr('id').split('_')[1];

                $('#mysubmitbutton_cat_itens').removeClass('d-none');

                $('.button_edit_cat').each(function () {

                    $(this).addClass('d-none');

                });

                $('.button_delete_cat').each(function () {

                    $(this).addClass('d-none');

                });

                $('.button_cancel_cat').each(function () {

                    $(this).addClass('d-none');

                });

                $('[id ^= "categora_item_espaco_edit_"]').each(function () {

                    if ($(this).attr('id') != 'categora_item_espaco_edit_' + id) {

                        $(this).children().eq(0).addClass('d-none');

                    }

                });


                $('#listalicatitens_' + id + ' li').each(function () {

                    pegaitensliiniapreensao.push([$(this).attr('id').split('_')[1], $(this).text().split(' ( ')[0], $(this).text().split(' ( ')[1].split(' ) ')[0], rgb2hex($(this).children().eq(0).css('background-color'))]);

                });

                const qualcat_id = id;
                const qualcat_ini = $('#categora_item_espaco_edit_' + id).children().eq(0).children().eq(0).children().eq(0).text();
                const qualcatcor_ini = rgb2hex($('#categora_item_espaco_edit_' + id).children().eq(0).children().eq(0).children().eq(0).children().eq(0).css('background-color'));

                pegacatapreensaoini.push(qualcat_id, qualcat_ini, qualcatcor_ini);

                console.log(pegacatapreensaoini);
                console.log(pegaitensliiniapreensao);

                $('#listalicatitens_' + id).empty().replaceWith(`<div id="new_inputs_space_cat_${id}"></div>`);

                $('#cancelcat_' + id).removeClass('d-none');

                if (pegaitensliiniapreensao.length > 0) {

                    for (let i = 0; i < pegaitensliiniapreensao.length; i++) {

                        let leselectedforma = '';

                        $('#new_inputs_space_cat_' + id).append('<div class="alert alert-secondary"><div class="row">' +
                            '<div class="col-7">' +
                            '<label for="name_item_cat_edit_' + pegaitensliiniapreensao[i][0] + '">Nome do Item </label> <input required class="form-control name_item_edit" type="text" value="' + pegaitensliiniapreensao[i][1] + '" id="name_item_cat_edit_' + pegaitensliiniapreensao[i][0] + '"><input class="id_item_edit" type="hidden" value="' + pegaitensliiniapreensao[i][0] + '" id="id_item_cat_edit_' + pegaitensliiniapreensao[i][0] + '">' +
                            '</div>' +
                            '<div class="col-2">' +
                            '<label for="forma_medir_item_cat_edit_' + pegaitensliiniapreensao[i][0] + '">Forma de Medir </label> <select required class="form-control forma_item_edit"  id="forma_medir_item_cat_edit_' + pegaitensliiniapreensao[i][0] + '"><option>Unidades</option><option>Kg</option><option>Ton</option><option>L</option><option>M²</option><option>M³</option></select>' +
                            '</div>' +
                            '<div class="col-2">' +
                            '<label for="cor_item_cat_edit_' + pegaitensliiniapreensao[i][0] + '">Cor </label> <input required class="form-control cor_item_edit" type="color" value="' + pegaitensliiniapreensao[i][3] + '" id="cor_item_cat_edit_' + pegaitensliiniapreensao[i][0] + '">' +
                            '</div>' +
                            '<div class="col-1 text-center">' +
                            '<label>Opções</label>' +
                            '<a href="#" class="form-control link-simples le_wild_delete_item_cat" id="removeitemcateditscreen_' + pegaitensliiniapreensao[i][0] + '"><i class="fa fa-trash"></i></a>' +
                            '</div>' +
                            '</div>' +
                            '</div>');


                        $('#forma_medir_item_cat_edit_' + pegaitensliiniapreensao[i][0] + ' option').each(function () {

                            if ($(this).val() == pegaitensliiniapreensao[i][2]) {

                                $(this).prop('selected', true);

                            }

                        });

                    }

                }

                let ajusttainpuuuut = '' +
                    '<div class="col">' +
                    '<div class="alert alert-primary">' +
                    '<div class="row">' +
                    '<div class="col-10">' +
                    '<label for="catname_edit_' + pegacatapreensaoini[0] + '">Nome da Categoria</label> <input required class="form-control" type="text" value="' + pegacatapreensaoini[1] + '" id="catname_edit_' + pegacatapreensaoini[0] + '"><input type="hidden" value="' + pegacatapreensaoini[0] + '" id="wild_cat_id">' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<label for="catcor_edit_' + pegacatapreensaoini[0] + '">Cor </label> <input required class="form-control" type="color" value="' + pegacatapreensaoini[2] + '" id="catcor_edit_' + pegacatapreensaoini[0] + '">' +
                    '</div>' +
                    '</div>' +
                    '</div><button data-id="' + pegacatapreensaoini[0] + '" class="btn btn-outline-dark" id="add_new_item_cat_edit_button"><i class="fa fa-plus-circle"></i> Adicionar novos itens</button>' +
                    '</div>'

                $('#categora_item_espaco_edit_' + pegacatapreensaoini[0]).children().eq(0).children().eq(0).children().eq(0).replaceWith(ajusttainpuuuut);


            });

            // cancela as edições
            $(document).on('click', '.button_cancel_cat', function (e) {

                e.preventDefault();

                let id = $(this).attr('id').split('_')[1];


                $('.button_edit_cat').each(function () {

                    $(this).removeClass('d-none');

                });

                $('.button_delete_cat').each(function () {

                    $(this).removeClass('d-none');

                });

                $('.button_cancel_cat').each(function () {

                    $(this).addClass('d-none');

                });

                $('[id ^= "categora_item_espaco_edit_"]').each(function () {


                    $(this).children().eq(0).removeClass('d-none');


                });


                $('#categora_item_espaco_edit_' + id + ' .alert-meu .row').children().eq(0).empty().removeClass('col-10').removeClass('col').addClass('col-11').append(pegacatapreensaoini[1] + '<span class="corbox-normal bordas" style="background-color: ' + pegacatapreensaoini[2] + ';"></span>');

                $('#new_inputs_space_cat_' + id).empty().replaceWith('<ul id="listalicatitens_' + pegacatapreensaoini[0] + '"></ul>');

                for (let i = 0; i < pegaitensliiniapreensao.length; i++) {

                    $('#listalicatitens_' + pegacatapreensaoini[0]).append('<li id="leitemedit_' + pegaitensliiniapreensao[i][0] + '">' + pegaitensliiniapreensao[i][1] + ' ( ' + pegaitensliiniapreensao[i][2] + ' ) <span class="bola" style="background-color: ' + pegaitensliiniapreensao[i][3] + ';"></span></li>');

                }


                pegaitensliiniapreensao = [];
                pegacatapreensaoini = [];


            });

            // submete alterações de itens
            $(document).on('submit', '#form_alterar_cat_item_apreensao', function (e) {

                e.preventDefault();

                const lewildid = $('#wild_cat_id').val();
                const lecatnewname = $('#catname_edit_' + lewildid).val();
                const lecatnewcolor = $('#catcor_edit_' + lewildid).val();

                let array_itens_antigos = [null];
                let array_itens_novos = [null];

                // se tem itens antigos
                if ($('.id_item_edit').length > 0) {

                    array_itens_antigos = [];

                    $('.id_item_edit').each(function () {

                        array_itens_antigos.push([
                            $(this).val(),
                            $('#name_item_cat_edit_' + $(this).val()).val(),
                            $('#forma_medir_item_cat_edit_' + $(this).val()).val(),
                            $('#cor_item_cat_edit_' + $(this).val()).val()
                        ]);

                    });
                }

                // se tem itens novos

                if ($('.new_name_item_edit').length > 0) {

                    array_itens_novos = [];

                    $('.new_name_item_edit').each(function () {

                        let mynewloop = $(this).attr('id').split('name_new_item_cat_edit_')[1];

                        console.log('mynewloop');
                        console.log(mynewloop);

                        array_itens_novos.push([
                            $('#name_new_item_cat_edit_' + mynewloop).val(),
                            $('#new_forma_medir_item_cat_edit_' + mynewloop).val(),
                            $('#new_cor_item_cat_edit_' + mynewloop).val()
                        ]);
                    });

                }

                $.ajax({
                    type: 'POST',
                    url: '/catapreensao/' + lewildid,
                    data: {
                        _method: 'PUT',
                        _token: $('meta[name=csrf-token]').attr('content'),
                        nome: lecatnewname,
                        cor: lecatnewcolor,
                        novos_itens: array_itens_novos,
                        old_itens: array_itens_antigos,

                    },

                    success: function (data) {

                        console.log('data');
                        console.log(data);


                        $('.button_edit_cat').each(function () {

                            $(this).removeClass('d-none');

                        });

                        $('.button_delete_cat').each(function () {

                            $(this).removeClass('d-none');

                        });

                        $('.button_cancel_cat').each(function () {

                            $(this).addClass('d-none');

                        });

                        $('[id ^= "categora_item_espaco_edit_"]').each(function () {


                            $(this).children().eq(0).removeClass('d-none');


                        });


                        $('#categora_item_espaco_edit_' + data.id + ' .alert-meu .row').children().eq(0).empty().removeClass('col-10').removeClass('col').addClass('col-11').append(data.nome + '<span class="corbox-normal bordas" style="background-color: ' + data.cor + ';"></span>');

                        $('#new_inputs_space_cat_' + data.id).empty().replaceWith('<ul id="listalicatitens_' + data.id + '"></ul>');

                        for (let i = 0; i < data.itens.length; i++) {

                            $('#listalicatitens_' + data.id).append('<li id="leitemedit_' + data.itens[i].id + '">' + data.itens[i].nome + ' ( ' + data.itens[i].forma_medir + ' ) <span class="bola" style="background-color: ' + data.itens[i].cor + ';"></span></li>');

                        }


                        pegaitensliiniapreensao = [];
                        pegacatapreensaoini = [];


                        $('#mysubmitbutton_cat_itens').addClass('d-none');

                        toastr.success('Categoria / itens alterados com sucesso!', 'Sucesso!');

                        // hide modal
                        //  $('#altera_acao').modal('hide');

                    },
                    error: function (data) {

                        toastr.error('Não foi possível alterar a Categoria e/ou seus itens!', 'Falha!');

                    }

                });


            });


        });

        // gera cor aleatória em js
        function aleatoryColor() {

            var rand = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
            var color = '#' + rand[Math.ceil(Math.random() * 15)] + rand[Math.ceil(Math.random() * 15)] + rand[Math.ceil(Math.random() * 15)] + rand[Math.ceil(Math.random() * 15)] + rand[Math.ceil(Math.random() * 15)] + rand[Math.ceil(Math.random() * 15)];

            return color;

        }


        var conta_novo_espaco_item_cat = 0;

        $(document).on('click', '#add_new_item_cat_edit_button', function (e) {

            e.preventDefault();

            const idcatget = $(this).data('id');

            const lenewsapceforitens = '<div class="alert alert-secondary" id="new_new_space_' + conta_novo_espaco_item_cat + '"><div class="row">' +
                '<div class="col-7">' +
                '<label for="name_new_item_cat_edit_' + conta_novo_espaco_item_cat + '">Nome do Item (Novo Item)</label> <input required class="form-control new_name_item_edit" type="text" id="name_new_item_cat_edit_' + conta_novo_espaco_item_cat + '">' +
                '</div>' +
                '<div class="col-2">' +
                '<label for="new_forma_medir_item_cat_edit_' + conta_novo_espaco_item_cat + '">Forma de Medir </label> <select required class="form-control new_forma_item_edit"  id="new_forma_medir_item_cat_edit_' + conta_novo_espaco_item_cat + '"><option>Unidades</option><option>Kg</option><option>Ton</option><option>L</option><option>M²</option><option>M³</option></select>' +
                '</div>' +
                '<div class="col-2">' +
                '<label for="new_cor_item_cat_edit_' + conta_novo_espaco_item_cat + '">Cor </label> <input required class="form-control new_cor_item_edit" type="color" value="' + aleatoryColor() + '" id="new_cor_item_cat_edit_' + conta_novo_espaco_item_cat + '">' +
                '</div>' +
                '<div class="col-1 text-center">' +
                '<label>Opções</label>' +
                '<a href="#" class="form-control link-simples le_new_wild_delete_item_cat" id="newremoveitemcateditscreen_' + conta_novo_espaco_item_cat + '"><i class="fa fa-trash"></i></a>' +
                '</div>' +
                '</div>' +
                '</div>';

            $('#new_inputs_space_cat_' + idcatget).prepend(lenewsapceforitens);

            conta_novo_espaco_item_cat++;

        });

        // remove um itemnovo na tela de edicão (não persistido)
        $(document).on('click', '.le_new_wild_delete_item_cat', function (e) {

            e.preventDefault();

            const id = $(this).attr('id').split('_')[1];

            $('#new_new_space_' + id).remove();

        });


        $(window).on('load', function () {
            $('#mycard').LoadingOverlay("hide");
        });
    </script>

@endsection
