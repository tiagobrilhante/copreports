@extends('layouts.insideApp.app')

@section('content')

    {{--card--}}
    <div class="card">

        {{--card header--}}
        <div class="card-header">

            <div class="row">

                <div class="col">

                    {{ __('Gerenciamento de Tipos de Relatórios') }}

                </div>

                <div class="col text-right">

                    {{--add new missão de emprego button--}}
                    <button class="btn btn-sm btn-outline-primary" id="new_missaoEmprego"><i
                            class="fa fa-plus-circle pr-2"></i>
                        Adicionar nova missão de emprego
                    </button>

                </div>

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

                {{--espaço para Tipos--}}
                <div class="tab-pane show active" id="pills-missoesEmprego" role="tabpanel">

                    <div class="alert alert-meu">

                        <h5>Missões de emprego cadastradas</h5>


                        @foreach ($missoesEmprego as $missaoEmprego)

                            <div class="alert alert-dark">

                                <div class="row">

                                    <div class="col-10">

                                        <span class="audiowide"> {{ $missaoEmprego->missao }} </span><br>

                                    </div>

                                    <div class="col-2 text-right">

                                        <a href="#" class="link-simples btn_editante" id="edit_{{$missaoEmprego->id}}"><i class="fa fa-edit"></i></a>

                                        <span class="separaicon"></span>

                                        <a href="#" class="link-simples btn_excludente" id="exclude_{{$missaoEmprego->id}}"><i class="fa fa-trash"></i></a>

                                    </div>

                                </div>

                                @if(count($missaoEmprego->subItens) > 0)
                                    <p>Sub Itens</p>

                                    <ul>
                                        @foreach($missaoEmprego->subItens as $si)
                                            <li>{{$si->sub_item}}
                                            </li>
                                        @endforeach
                                    </ul>

                                @endif


                            </div>


                        @endforeach

                    </div>
                </div>

                {{--espaço para ações--}}
                <div class="tab-pane " id="pills-action" role="tabpanel" aria-labelledby="pills-action-tab">

                    acoes

                </div>

                {{--espaço para resultados--}}
                <div class="tab-pane " id="pills-result" role="tabpanel" aria-labelledby="pills-result-tab">

                    Resultados

                </div>

            </div>

        </div>

    </div>


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

    {{--modal de exibir dados de uma pessoa--}}
    <div class="modal fade" id="exibe_pessoa" tabindex="-1" role="dialog"
         aria-labelledby="exibe_pessoaLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Detalhes - <span class="the_posto_grad"></span> <span
                            class="the_nome_guerra"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{--modal body--}}
                <div class="modal-body">

                    <div class=" alert alert-meu">

                        {{---nome e nome de guerra (posto)--}}
                        <div class="row">

                            {{--nome--}}
                            <div class="col">

                                <b>Nome: </b> <span class="the_nome"></span>

                            </div>

                            {{--nome de guerra / posto--}}
                            <div class="col">

                                <b>Nome de Guerra: </b> <span class="the_posto_grad"></span> <span
                                    class="the_nome_guerra"></span>

                            </div>

                        </div>

                        {{---email e tel contato--}}
                        <div class="row">

                            {{--email--}}
                            <div class="col">

                                <b>Email: </b> <span class="the_email"></span>

                            </div>

                            {{--tel contato--}}
                            <div class="col">

                                <b>Telefone de Contato: </b> <span class="the_tel"></span>

                            </div>

                        </div>


                        <div id="espaco_forma" class="d-none">
                            <div class="row">
                                <div class="col">
                                    <b>Turma de formação: </b> <span class="the_formacao"></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="alert alert-dark">

                        {{---tipo de usuario e om --}}
                        <div class="row">

                            {{--tipo de usuario--}}
                            <div class="col">

                                <b>Tipo de usuário: </b> <span class="the_tipo"></span>

                            </div>

                            {{--om--}}
                            <div class="col">

                                <b>Om: </b> <span class="the_om"></span>

                            </div>

                        </div>

                    </div>


                    <div class="alert alert-primary">
                        <b>Token de Acesso: </b> <span class="the_token"></span>
                    </div>


                </div>

                {{--modal footer--}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                </div>

            </div>

        </div>

    </div>



    {{--modal de alterar dados de uma pessoa--}}
    <div class="modal fade" id="altera_pessoa" tabindex="-1" role="dialog"
         aria-labelledby="altera_pessoaLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Alteração de dados - <span class="the_posto_grad"></span> <span
                            class="the_nome_guerra"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="form_alterar_user">

                    {{--modal body--}}
                    <div class="modal-body">

                        <div class=" alert alert-meu">

                            {{---nome e nome de guerra (posto)--}}
                            <div class="row">

                                {{--nome--}}
                                <div class="col">

                                    <div class="form-group">

                                        <label for="nome_user_edit">Nome</label>
                                        <input type="text" class="form-control" id="nome_user_edit"
                                               aria-describedby="name_user_edit_help">

                                        <input type="hidden" id="id_user_edit">

                                        <small id="name_user_edit_help" class="form-text text-muted">Altere o nome do
                                            usuário se desejar.</small>

                                    </div>

                                </div>

                                {{--nome de guerra / posto--}}
                                <div class="col">

                                    <div class="row">

                                        <div class="form-group col-5">

                                            <label for="nome_guerra_user_edit">P/G</label>
                                            <select class="form-control" id="posto_grad_user_edit"
                                                    aria-describedby="posto_grad_user_edit_help">
                                                <option>Gen Ex</option>
                                                <option>Gen Div</option>
                                                <option>Gen Bda</option>
                                                <option>Cel</option>
                                                <option>Ten Cel</option>
                                                <option>Maj</option>
                                                <option>Cap</option>
                                                <option>1º Ten</option>
                                                <option>2º Ten</option>
                                                <option>Asp</option>
                                                <option>S Ten</option>
                                                <option>1º Sgt</option>
                                                <option>2º Sgt</option>
                                                <option>3º Sgt</option>
                                                <option>Cb</option>
                                                <option>Sd</option>
                                                <option>SC</option>

                                            </select>

                                            <small id="posto_grad_user_edit_help" class="form-text text-muted">Altere o
                                                Posto/ Grad do usuário se desejar.</small>

                                        </div>

                                        <div class="form-group col-7">

                                            <label for="nome_guerra_user_edit">Nome de Guerra</label>
                                            <input type="text" class="form-control" id="nome_guerra_user_edit"
                                                   aria-describedby="nome_guerra_user_edit_help">

                                            <small id="nome_guerra_user_edit_help" class="form-text text-muted">Altere o
                                                nome de guerra do usuário se desejar.</small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{---email e tel contato--}}
                            <div class="row">

                                {{--email--}}
                                <div class="col">

                                    <div class="form-group">

                                        <label for="email_user_edit">Nome de Guerra</label>
                                        <input type="text" class="form-control" id="email_user_edit"
                                               aria-describedby="email_user_edit_help">

                                        <small id="email_user_edit_help" class="form-text text-muted">Altere o email do
                                            usuário se desejar.</small>

                                    </div>

                                </div>

                                {{--tel contato--}}
                                <div class="col">

                                    <div class="form-group">

                                        <label for="tel_user_edit">Telefone de Contato</label>
                                        <input type="tel" class="form-control tel_ctt" id="tel_user_edit"
                                               aria-describedby="tel_user_edit_help">

                                        <small id="tel_user_edit_help" class="form-text text-muted">Altere o Telefone de
                                            contato do usuário se desejar.</small>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="alert alert-dark">

                            {{---tipo de usuario e om --}}
                            <div class="row">

                                {{--om--}}
                                <div class="col">

                                    <div class="form-group">

                                        <label for="om_user_edit">Om</label>

                                        <select class="form-control" id="om_user_edit"
                                                aria-describedby="om_user_edit_help">

                                        </select>

                                        <small id="om_user_edit_help" class="form-text text-muted">Altere a Om do
                                            usuário se desejar.</small>

                                    </div>

                                </div>

                                {{--tipo de usuario--}}
                                <div class="col">
                                    <div id="selectContainer_edit">
                                        <div class="form-group">

                                            <label for="type_user_edit">Tipo de Usuário</label>

                                            <select class="form-control" id="type_user_edit"
                                                    aria-describedby="type_user_edit_help">

                                            </select>

                                            <small id="type_user_edit_help" class="form-text text-muted">Altere o tipo
                                                de usuário se desejar.</small>
                                        </div>

                                    </div>

                                </div>


                            </div>

                        </div>


                        <div class="alert alert-primary">
                            <b>Token de Acesso: </b> <span class="the_token"></span>
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

@endsection

@section('myScripts')

    {{-- load maskinput --}}
    <script src="{{ asset('js/maskinput.js') }}" defer></script>

    <script>
        $(function () {


            // abre o modal de cadastro de novos usuários e monta o select de OM
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

                let le_su_itens = [];

                for (let i = 0; i < $('.le_array_si').length; i++) {

                    le_su_itens.push($('.le_array_si').eq(i).val())

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

                        console.log(data);


                        // alerta de sucesso
                        toastr.success('A missão de emprego foi cadastrada com sucesso!', 'Sucesso!');

                        $('#cadastra_missaoEmprego').modal('hide');


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

            });

            // exclui subtipos durante a tela de criação de missões de emprego
            $(document).on('click', '.button_exclude_st', function (e) {

                e.preventDefault();

                let id = $(this).attr('id').split('_')[1];

                $('#st_inputs_' + id).remove();

                var le_inputs_number = $('.counter_input').length;

                if (le_inputs_number == 0) {

                    $('#base_st_space').addClass('d-none');

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





            // masks

            // mask cpf
            $("#cpf").mask("999.999.999-99");

            // mask tel
            $(".tel_ctt").mask("(99) 99999-9999");

            // inicializa o datatables
            $('#user_table').DataTable({
                processing: false,
                serverSide: false,
                autoWidth: false,
                language: {
                    emptyTable: "Nenhum usuário cadastrado",
                    info: "Mostrando _START_ até _END_ de _TOTAL_ registros",
                    infoEmpty: "Não existem registros a serem mostrados",
                    infoFiltered: "(Filtrado de um total de _MAX_ registros)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Mostrar _MENU_ registros",
                    loadingRecords: "Carregando...",
                    processing: "Processando...",
                    search: "Pesquisar:",
                    zeroRecords: "Nenhum registro encontrado correspondente a busca",
                    paginate: {
                        "first": "Primeiro",
                        "last": "Último",
                        "next": "Próximo",
                        "previous": "Anterior"
                    },
                    aria: {
                        "sortAscending": ": Ative para organizar de forma crescente.",
                        "sortDescending": ": Ative para organizar de forma decrescente."
                    }
                },
                pageLength: 50,

                ajax: "/allusers/todos",
                type: 'GET',
                rowId: function (a) {
                    return 'user_' + a.id;
                },
                columns: [
                    {data: "id", name: 'id', 'visible': false},
                    {data: "nome"},
                    {data: "user_tipo.tipo", className: 'text-center'},
                    {data: "om.sigla", className: 'text-center'},
                    {
                        data: "om.podeVerTudo", className: 'text-center', orderable: false,
                        render: function (data, type, row) {

                            if (data === 1) {

                                return '<i id="verGeral_' + row.id + '" data-tippy-content="Pode ver tudo" class="fa fa-eye"></i>';

                            } else {
                                return '<i id="verGeral_' + row.id + '" data-tippy-content="Não pode ver tudo" class="fa fa-eye-slash"></i>';
                            }


                        }
                    },
                    {data: "status", className: "text-center", name: "status"},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        className: 'text-center',
                        render: function (data, type, row) {

                            let classe_button = '';
                            let classe_icon = '';
                            let text_tippy = '';

                            if (row.status == 'Ativo') {

                                classe_button = 'btn-outline-danger';
                                classe_icon = 'fa-ban';
                                text_tippy = 'Desativar Pessoa';

                            } else if (row.status == 'Inativo') {
                                classe_button = 'btn-outline-primary';
                                classe_icon = 'fa-check-circle';
                                text_tippy = 'Ativar Pessoa';
                            } else if (row.status == 'Resetado') {
                                classe_button = 'btn-outline-dark';
                                classe_icon = 'fa-spinner';
                                text_tippy = 'Usuário resetado aguardando acesso';
                            }

                            return '<button id="show_' + row.id + '" class="btn btn-sm btn-success btn_show" title="Detalhes sobre a pessoa" data-tippy-content="Exibe detalhes sobre a pessoa">' +
                                '<i class="fa fa-search"></i>' +
                                '</button>' +
                                '<span class="separaicon"></span>' +
                                '<button id="editar_' + row.id + '" class="btn btn-sm btn-warning btn_edit" title="Alterar Informações" data-tippy-content="Alterar Informações">' +
                                '<i class="fa fa-edit"></i>' +
                                '</button>' +
                                '<span class="separaicon"></span>' +
                                '<button id="resetar_' + row.id + '" class="btn btn-sm btn-secondary btn_reset" title="Resetar Usuário" data-tippy-content="Resetar senha de usuário">' +
                                '<i class="fa fa-lock"></i>' +
                                '</button>' +
                                '<span class="separaicon"></span>' +
                                '<button id="desativa_' + row.id + '" class="btn btn-sm ' + classe_button + ' btn_desativa" title="Desativar pessoa" data-tippy-content="' + text_tippy + '">' +
                                '<i id="iconStatus_' + row.id + '" class="fa ' + classe_icon + '"></i>' +
                                '</button>' +
                                '<span class="separaicon"></span>' +
                                '<button id="excluir_' + row.id + '" class="btn btn-sm btn-danger btn_exclude" title="Excluir pessoa" data-tippy-content="Excluir Pessoa">' +
                                '<i class="fa fa-trash"></i>' +
                                '</button>';

                        }
                    },
                ],
                order: [[0, 'desc']]
            });

            // monta as tabelas filtradas por tipos
            $(document).on('click', '.mytabsselect', function () {

                // destroi a instancia
                var leTable = $('#user_table').DataTable();
                leTable.destroy();

                let what_type = $(this).attr('id').split('-')[1];

                console.log(what_type);

                $('#user_table').DataTable({
                    processing: false,
                    serverSide: false,
                    autoWidth: false,
                    language: {
                        emptyTable: "Nenhum usuário cadastrado",
                        info: "Mostrando _START_ até _END_ de _TOTAL_ registros",
                        infoEmpty: "Não existem registros a serem mostrados",
                        infoFiltered: "(Filtrado de um total de _MAX_ registros)",
                        infoPostFix: "",
                        thousands: ",",
                        lengthMenu: "Mostrar _MENU_ registros",
                        loadingRecords: "Carregando...",
                        processing: "Processando...",
                        search: "Pesquisar:",
                        zeroRecords: "Nenhum registro encontrado correspondente a busca",
                        paginate: {
                            "first": "Primeiro",
                            "last": "Último",
                            "next": "Próximo",
                            "previous": "Anterior"
                        },
                        aria: {
                            "sortAscending": ": Ative para organizar de forma crescente.",
                            "sortDescending": ": Ative para organizar de forma decrescente."
                        }
                    },
                    pageLength: 50,

                    ajax: "/allusers/" + what_type,
                    type: 'GET',
                    rowId: function (a) {
                        return 'user_' + a.id;
                    },
                    columns: [
                        {data: "id", name: 'id', 'visible': false},
                        {data: "nome"},
                        {data: "user_tipo.tipo", className: 'text-center'},
                        {data: "om.sigla", className: 'text-center'},
                        {
                            data: "om.podeVerTudo", className: 'text-center', orderable: false,
                            render: function (data, type, row) {

                                if (data === 1) {

                                    return '<i id="verGeral_' + row.id + '" data-tippy-content="Pode ver tudo" class="fa fa-eye"></i>';

                                } else {
                                    return '<i id="verGeral_' + row.id + '" data-tippy-content="Não pode ver tudo" class="fa fa-eye-slash"></i>';
                                }


                            }
                        },
                        {data: "status", className: "text-center", name: "status"},
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            className: 'text-center',
                            render: function (data, type, row) {

                                let classe_button = '';
                                let classe_icon = '';
                                let text_tippy = '';

                                if (row.status == 'Ativo') {

                                    classe_button = 'btn-outline-danger';
                                    classe_icon = 'fa-ban';
                                    text_tippy = 'Desativar Pessoa';

                                } else if (row.status == 'Inativo') {
                                    classe_button = 'btn-outline-primary';
                                    classe_icon = 'fa-check-circle';
                                    text_tippy = 'Ativar Pessoa';
                                } else if (row.status == 'Resetado') {
                                    classe_button = 'btn-outline-dark';
                                    classe_icon = 'fa-spinner';
                                    text_tippy = 'Usuário resetado aguardando acesso';
                                }

                                return '<button id="show_' + row.id + '" class="btn btn-sm btn-success btn_show" title="Detalhes sobre a pessoa" data-tippy-content="Exibe detalhes sobre a pessoa">' +
                                    '<i class="fa fa-search"></i>' +
                                    '</button>' +
                                    '<span class="separaicon"></span>' +
                                    '<button id="editar_' + row.id + '" class="btn btn-sm btn-warning btn_edit" title="Alterar Informações" data-tippy-content="Alterar Informações">' +
                                    '<i class="fa fa-edit"></i>' +
                                    '</button>' +
                                    '<span class="separaicon"></span>' +
                                    '<button id="resetar_' + row.id + '" class="btn btn-sm btn-secondary btn_reset" title="Resetar Usuário" data-tippy-content="Resetar senha de usuário">' +
                                    '<i class="fa fa-lock"></i>' +
                                    '</button>' +
                                    '<span class="separaicon"></span>' +
                                    '<button id="desativa_' + row.id + '" class="btn btn-sm ' + classe_button + ' btn_desativa" title="Desativar pessoa" data-tippy-content="' + text_tippy + '">' +
                                    '<i id="iconStatus_' + row.id + '" class="fa ' + classe_icon + '"></i>' +
                                    '</button>' +
                                    '<span class="separaicon"></span>' +
                                    '<button id="excluir_' + row.id + '" class="btn btn-sm btn-danger btn_exclude" title="Excluir pessoa" data-tippy-content="Excluir Pessoa">' +
                                    '<i class="fa fa-trash"></i>' +
                                    '</button>';

                            }
                        },
                    ],
                    order: [[0, 'desc']]
                });

                $('#user_table').on('draw.dt', function () {
                    tippy('[data-tippy-content]');
                });

            });

            $('#user_table').on('draw.dt', function () {
                tippy('[data-tippy-content]');
            });

            // monta a tabela de seriais
            $(document).on('click', '#pills-serial-tab', function () {

                // inicializa o datatables
                var leSerial = $('#serial_table').DataTable();
                leSerial.destroy();

                $('#serial_table').DataTable({
                    processing: false,
                    serverSide: false,
                    autoWidth: false,
                    language: {
                        emptyTable: "Nenhum serial cadastrado",
                        info: "Mostrando _START_ até _END_ de _TOTAL_ registros",
                        infoEmpty: "Não existem registros a serem mostrados",
                        infoFiltered: "(Filtrado de um total de _MAX_ registros)",
                        infoPostFix: "",
                        thousands: ",",
                        lengthMenu: "Mostrar _MENU_ registros",
                        loadingRecords: "Carregando...",
                        processing: "Processando...",
                        search: "Pesquisar:",
                        zeroRecords: "Nenhum registro encontrado correspondente a busca",
                        paginate: {
                            "first": "Primeiro",
                            "last": "Último",
                            "next": "Próximo",
                            "previous": "Anterior"
                        },
                        aria: {
                            "sortAscending": ": Ative para organizar de forma crescente.",
                            "sortDescending": ": Ative para organizar de forma decrescente."
                        }
                    },
                    pageLength: 50,

                    ajax: "/alltoken/serialtodos",
                    type: 'GET',
                    rowId: function (a) {
                        return 'serial_' + a.id;
                    },
                    columns: [
                        {data: "id", name: 'id', 'visible': false},
                        {data: "token", className: 'text-center'},
                        {data: "om.sigla"},
                        {data: "type", className: 'text-center'},
                        {data: "status", className: "text-center", name: "status"},
                        {data: "reference", className: 'text-center'},
                        {
                            data: "user.nome", className: "text-center",
                            render: function (data, type, row) {

                                if (row.status == 'Utilizado') {

                                    return row.user.posto_grad + ' ' + row.user.nome_guerra + ' ';

                                } else {

                                    return '-';
                                }


                            }
                        },
                        {
                            data: "gerador_tokens.nome", className: "text-center",
                            render: function (data, type, row) {
                                return row.gerador_tokens.posto_grad + ' ' + row.gerador_tokens.nome_guerra + ' ';
                            }
                        },

                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            className: 'h-100 text-center justify-content-center align-items-center align-middle',
                            render: function (data, type, row) {

                                if (row.status == 'Aguardando Uso') {


                                    return '<button id="excluirToken_' + row.id + '" class="btn btn-sm btn-danger btn_exclude_token" title="Excluir Chave" data-tippy-content="Excluir Chave">' +
                                        '<i class="fa fa-trash"></i>' +
                                        '</button>';

                                } else if (row.status == 'Expirado') {

                                    return '<button id="renovarToken_' + row.id + '" class="btn btn-sm btn-warning btn_renova_token" title="Renovar Chave" data-tippy-content="Renovar Chave">' +
                                        '<i class="fa fa-redo"></i>' +
                                        '</button>' +
                                        '<span class="separaicon"></span>' +
                                        '<button id="excluirToken_' + row.id + '" class="btn btn-sm btn-danger btn_exclude_token" title="Excluir Chave" data-tippy-content="Excluir Chave">' +
                                        '<i class="fa fa-trash"></i>' +
                                        '</button>';

                                } else {

                                    return '-';

                                }

                            }

                        },

                    ],
                    order: [[0, 'desc']]
                });

            });

            // retorna informações sobre a pessoa
            $(document).on('click', '.btn_show', function (e) {

                e.preventDefault();

                var id = $(this).attr('id').split('_')[1];

                $.ajax({
                    type: 'GET',
                    url: '/admin/usermanager/' + id,

                    success: function (data) {

                        $('.the_posto_grad').text(data.posto_grad);
                        $('.the_nome_guerra').text(data.nome_guerra);
                        $('.the_nome').text(data.nome);
                        $('.the_email').text(data.email);
                        $('.the_tel').text(data.tel_contato);

                        $('.the_tipo').text(data.user_tipo.tipo);
                        $('.the_om').text(data.om.name);
                        $('.the_token').text(data.token.token + ' ( Gerado por: ' + data.token.gerador_tokens.posto_grad + ' ' + data.token.gerador_tokens.nome_guerra + ' - ' + data.token.gerador_tokens.om.sigla + ' ) ');

                        // show modal
                        $('#exibe_pessoa').modal('show');
                    },
                    error: function () {

                        // alert de erro
                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                    }

                });

            });


            // retorna os possiveis tipos que a OM admite cadastro
            $(document).on('change', '#select_om_new_user , #om_user_edit', function (e) {

                e.preventDefault();

                const id = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '/mytypes/' + id,

                    beforeSend: function () {

                        $('#selectContainer').LoadingOverlay("show");
                        $('#selectContainer_edit').LoadingOverlay("show");

                    },
                    success: function (data) {

                        $('#select_space').removeClass('d-none');


                        $('#select_type_new_user').empty();
                        $('#type_user_edit').empty();

                        for (let i = 0; i < data.length; i++) {
                            $('#select_type_new_user, #type_user_edit').append('<option>' + data[i] + '</option>');
                        }


                        $('#selectContainer').LoadingOverlay("hide");
                        $('#selectContainer_edit').LoadingOverlay("hide");


                    },
                    error: function () {

                        // alert de erro
                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                    }

                });


            });


            // ao clicar ajusta para gerar uma nova chave
            $(document).on('click', '#botao_gerar_nova', function (e) {

                e.preventDefault();

                $('#sub_espaco_inputs').removeClass('d-none');
                $('#retorno_chave').addClass('d-none');
                $('#botao_gerar_nova').addClass('d-none');
                $('#botao_submit').removeClass('d-none');
                $('#select_space').addClass('d-none');
                $('#cancel_new_user').text('Cancelar');

                $('#dado_new_user').val('');
                $('#select_om_new_user').val('');
                $('#select_type_new_user').empty();

            });



            // muda status user (Ativo Inativo)
            $(document).on('click', '.btn_desativa', function (e) {

                e.preventDefault();

                var id = $(this).attr('id').split('_')[1];

                if ($(this).hasClass('btn-outline-dark')) {

                    // alerta de erro
                    toastr.error('Você não pode desativar um usuário resetado!', 'Erro!');

                } else {

                    $.confirm({
                        title: 'Você esta certo disso?',
                        content: 'A ação de desativar um usuário vai impedir o mesmo de ter acesso ao CopReports, no entanto manterá todos os dados relativos a histórico de ações e acessos!',
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
                                        url: '/user/status/' + id,

                                        data: {
                                            _method: 'GET',
                                        },
                                        success: function (data) {

                                            var $userTable = $('#user_table').dataTable();

                                            // The second parameter will be the row, and the third is the column.
                                            $userTable.fnUpdate(data.status, '#user_' + id, 5);

                                            //arruma botão

                                            if (data.status == 'Inativo') {

                                                $('#desativa_' + id).removeClass('btn-outline-danger').addClass('btn-outline-primary');
                                                $('#iconStatus_' + id).removeClass('fa-ban').addClass('fa-check-circle');
                                                $('#desativa_' + id).attr('data-tippy-content', 'Ativar Pessoa');

                                            } else if (data.status == 'Ativo') {

                                                $('#desativa_' + id).addClass('btn-outline-danger').removeClass('btn-outline-primary');
                                                $('#iconStatus_' + id).addClass('fa-ban').removeClass('fa-check-circle');
                                                $('#desativa_' + id).attr('data-tippy-content', 'Desativar Pessoa');

                                            }

                                            // reload tippy
                                            tippy('[data-tippy-content]');

                                            // alerta de sucesso
                                            toastr.success('O usuário foi desativado com sucesso!', 'Sucesso!');

                                        },
                                        error: function (data) {

                                            // alert de erro
                                            toastr.error('Não foi possível desativar o usuário!', 'Falha!');

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
                }

            });

            // abre o modal de editar pessoa
            $(document).on('click', '.btn_edit', function (e) {

                e.preventDefault();

                var id = $(this).attr('id').split('_')[1];

                $.ajax({
                    type: 'GET',
                    url: '/admin/usermanager/' + id,

                    success: function (data) {

                        $('.the_posto_grad').text(data.posto_grad);
                        $('.the_nome_guerra').text(data.nome_guerra);

                        $('#id_user_edit').val(data.id);

                        $('#nome_user_edit').val(data.nome);
                        $('#nome_guerra_user_edit').val(data.nome_guerra);

                        $('#email_user_edit').val(data.email);
                        $('#tel_user_edit').val(data.tel_contato);

                        $('#posto_grad_user_edit').val(data.posto_grad)

                        var id_my_om = data.om.id;
                        var meutipo_edit = data.user_tipo.tipo;

                        // monta o select de OM possiveis
                        $.ajax({
                            type: 'GET',
                            url: '/myom',

                            success: function (data) {

                                $('#om_user_edit').empty();

                                const arrayOms = [];

                                function omRecursiva(om) {
                                    return om.map(function (oms) {
                                        const existeSubordinada = oms.om.length;

                                        const newOptions = {
                                            id: oms.id,
                                            name: oms.sigla,
                                        };

                                        if (existeSubordinada > 0) {
                                            omRecursiva(oms.om);
                                        }

                                        arrayOms.push(newOptions);
                                    });
                                }

                                const oms = data;

                                oms.map((teste) => {
                                    arrayOms.push({id: teste.id, name: teste.sigla});
                                    const resul = omRecursiva(teste.om);
                                    return resul;
                                });

                                let options = '<option value=""> --- Selecione ---</option>';

                                arrayOms.map(function (resultadoFinal) {

                                    let selecionado = '';

                                    if (resultadoFinal.id == id_my_om) {
                                        selecionado = 'selected';
                                    }

                                    options += `<option ${selecionado} value=${resultadoFinal.id}>${resultadoFinal.name}</option>`;
                                })

                                $('#om_user_edit').append(options);


                                $.ajax({
                                    type: 'GET',
                                    url: '/mytypes/' + id,

                                    beforeSend: function () {

                                        $('#selectContainer_edit').LoadingOverlay("show");

                                    },
                                    success: function (data) {

                                        $('#type_user_edit').empty();

                                        for (let i = 0; i < data.length; i++) {

                                            var typeUserEditSelected = '';
                                            if (data[i] == meutipo_edit) {
                                                typeUserEditSelected = 'selected';
                                            }

                                            $('#type_user_edit').append('<option ' + typeUserEditSelected + '>' + data[i] + '</option>');
                                        }


                                        $('#selectContainer_edit').LoadingOverlay("hide");


                                    },
                                    error: function () {

                                        // alert de erro
                                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                                    }

                                });


                            },
                            error: function () {

                                // alert de erro
                                toastr.error('Não foi possível obter as informações!', 'Falha!');

                            }

                        });

                        $('.the_token').text(data.token.token + ' ( Gerado por: ' + data.token.gerador_tokens.posto_grad + ' ' + data.token.gerador_tokens.nome_guerra + ' - ' + data.token.gerador_tokens.om.sigla + ' ) ');

                        // show modal
                        $('#altera_pessoa').modal('show');
                    },
                    error: function () {

                        // alert de erro
                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                    }

                });

            });

            // submete a edição de um usuário já cadastrado
            $(document).on('submit', '#form_alterar_user', function (e) {

                e.preventDefault(e);

                let le_id_edit = $('#id_user_edit').val();

                $.ajax({
                    type: 'POST',
                    url: '/admin/usermanager/' + le_id_edit,
                    data: {
                        _method: 'PUT',
                        _token: $('meta[name=csrf-token]').attr('content'),
                        om_id: $('#om_user_edit').val(),
                        type: $('#type_user_edit').val(),
                        nome: $('#nome_user_edit').val(),
                        nome_guerra: $('#nome_guerra_user_edit').val(),
                        posto_grad: $('#posto_grad_user_edit').val(),
                        tel_contato: $('#tel_user_edit').val(),
                        email: $('#email_user_edit').val(),

                    },

                    success: function (data) {


                        var $userTable = $('#user_table').dataTable();

                        // The second parameter will be the row, and the third is the column.
                        $userTable.fnUpdate(data.nome, '#user_' + data.id, 1);
                        $userTable.fnUpdate(data.user_tipo.tipo, '#user_' + data.id, 2);
                        $userTable.fnUpdate(data.om.sigla, '#user_' + data.id, 3);

                        if (data.om.podeVerTudo) {

                            $('#verGeral_' + data.id).removeClass('fa-eye-slash').addClass('fa-eye');

                        } else {

                            $('#verGeral_' + data.id).removeClass('fa-eye').addClass('fa-eye-slash');

                        }

                        $('#altera_pessoa').modal('hide');


                        // alerta de sucesso
                        toastr.success('O usuário foi alterado com sucesso!', 'Sucesso!');


                    },
                    error: function (data) {

                        console.log(data);

                        toastr.error('Não foi possível alterar o usuário!', 'Falha!');

                    }


                });

            });

            //renova token
            $(document).on('click', '.btn_renova_token', function (e) {

                e.preventDefault();

                console.log('renova');


                var id = $(this).attr('id').split('_')[1];

                $.confirm({
                    title: 'Você esta certo disso?',
                    content: 'A data de criação do Token será ajustada para o dia de hoje. ',
                    buttons: {
                        Confirmar: {
                            action: function () {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: 'GET',
                                    url: '/renovatoken/' + id,

                                    success: function (data) {

                                        // TENHO QUE ATUALIZAR O STATUS DO TOKEN E REMOVER O BOTÃO DE RENOVAR
                                        var $serialTable = $('#serial_table').dataTable();

                                        // The second parameter will be the row, and the third is the column.
                                        $serialTable.fnUpdate(data.status, '#serial_' + id, 4);

                                        $('#renovarToken_' + id).next().remove();
                                        $('#renovarToken_' + id).remove();

                                        // alerta de sucesso
                                        toastr.success('O Token foi renovado com sucesso!', 'Sucesso!');

                                    },
                                    error: function () {

                                        // alert de erro
                                        toastr.error('Não foi possível renovar o Token!', 'Falha!');

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

            // remove um token sem dono
            $(document).on('click', '.btn_exclude_token', function (e) {

                e.preventDefault();

                var id = $(this).attr('id').split('_')[1];

                console.log('excluir token');
                console.log(id);

                $.confirm({
                    title: 'Você esta certo disso?',
                    content: 'A ação de excluir um Token de acesso vai removê-lo definitivamente do sistema, nenhum usuário poderá usar esse token para efetuar o cadastro no CopReports!',
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
                                    url: '/token/' + id,

                                    data: {
                                        _method: 'DELETE',
                                    },
                                    success: function (data) {

                                        // remove da tabela do grupo
                                        var tableSerial = $('#serial_table').DataTable();
                                        tableSerial.row('tr[id = "serial_' + id + '" ]').remove().draw(false);


                                        if (data == 'Ok') {

                                            // alerta de sucesso
                                            toastr.success('O token foi excluído com sucesso!', 'Sucesso!');

                                        } else {

                                            // alert de erro
                                            toastr.error(data, 'Falha!');

                                        }

                                    },
                                    error: function (data) {

                                        console.log(data);

                                        // alert de erro
                                        toastr.error('Não foi possível excluir o token!', 'Falha!');

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

            // filtra os seriais por tipo de status
            $(document).on('click', '.serialselect', function (e) {

                e.preventDefault();

                // destroi a instancia
                var leTable = $('#serial_table').DataTable();
                leTable.destroy();

                let what_type = $(this).attr('id').split('-')[1];

                console.log(what_type);

                $('#serial_table').DataTable({
                    processing: false,
                    serverSide: false,
                    autoWidth: false,
                    language: {
                        emptyTable: "Nenhum serial cadastrado",
                        info: "Mostrando _START_ até _END_ de _TOTAL_ registros",
                        infoEmpty: "Não existem registros a serem mostrados",
                        infoFiltered: "(Filtrado de um total de _MAX_ registros)",
                        infoPostFix: "",
                        thousands: ",",
                        lengthMenu: "Mostrar _MENU_ registros",
                        loadingRecords: "Carregando...",
                        processing: "Processando...",
                        search: "Pesquisar:",
                        zeroRecords: "Nenhum registro encontrado correspondente a busca",
                        paginate: {
                            "first": "Primeiro",
                            "last": "Último",
                            "next": "Próximo",
                            "previous": "Anterior"
                        },
                        aria: {
                            "sortAscending": ": Ative para organizar de forma crescente.",
                            "sortDescending": ": Ative para organizar de forma decrescente."
                        }
                    },
                    pageLength: 50,

                    ajax: "/alltoken/" + what_type,
                    type: 'GET',
                    rowId: function (a) {
                        return 'serial_' + a.id;
                    },
                    columns: [
                        {data: "id", name: 'id', 'visible': false},
                        {data: "token", className: 'text-center'},
                        {data: "om.sigla"},
                        {data: "type", className: 'text-center'},
                        {data: "status", className: "text-center", name: "status"},
                        {data: "reference", className: 'text-center'},
                        {
                            data: "user.nome", className: "text-center",
                            render: function (data, type, row) {

                                if (row.status == 'Utilizado') {

                                    return row.user.posto_grad + ' ' + row.user.nome_guerra + ' ';

                                } else {

                                    return '-';
                                }


                            }
                        },
                        {
                            data: "gerador_tokens.nome", className: "text-center",
                            render: function (data, type, row) {
                                return row.gerador_tokens.posto_grad + ' ' + row.gerador_tokens.nome_guerra + ' ';
                            }
                        },

                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            className: 'h-100 text-center justify-content-center align-items-center align-middle',
                            render: function (data, type, row) {

                                if (row.status == 'Aguardando Uso') {


                                    return '<button id="excluirToken_' + row.id + '" class="btn btn-sm btn-danger btn_exclude_token" title="Excluir Chave" data-tippy-content="Excluir Chave">' +
                                        '<i class="fa fa-trash"></i>' +
                                        '</button>';

                                } else if (row.status == 'Expirado') {

                                    return '<button id="renovarToken_' + row.id + '" class="btn btn-sm btn-warning btn_renova_token" title="Renovar Chave" data-tippy-content="Renovar Chave">' +
                                        '<i class="fa fa-redo"></i>' +
                                        '</button>' +
                                        '<span class="separaicon"></span>' +
                                        '<button id="excluirToken_' + row.id + '" class="btn btn-sm btn-danger btn_exclude_token" title="Excluir Chave" data-tippy-content="Excluir Chave">' +
                                        '<i class="fa fa-trash"></i>' +
                                        '</button>';

                                } else {

                                    return '-';

                                }

                            }

                        },

                    ],
                    order: [[0, 'desc']]
                });

                $('#serial_table').on('draw.dt', function () {
                    tippy('[data-tippy-content]');
                });

            });

            // reseta a senha do usuário
            $(document).on('click', '.btn_reset', function (e) {

                e.preventDefault();

                var id = $(this).attr('id').split('_')[1];

                $.confirm({
                    title: 'Você esta certo disso?',
                    content: 'A senha do usuário será alterada para o email do usuário!',
                    buttons: {
                        Confirmar: {
                            action: function () {
                                $.ajax({
                                    type: 'GET',
                                    url: '/resetpasswd/' + id,

                                    success: function (data) {

                                        if (data == 'Success') {
                                            // alerta de sucesso


                                            var $userTable = $('#user_table').dataTable();

                                            // The second parameter will be the row, and the third is the column.
                                            $userTable.fnUpdate('Resetado', '#user_' + id, 5);

                                            $('#desativa_' + id).removeClass('btn-outline-danger').removeClass('btn-outline-primary').addClass('btn-outline-dark').attr('data-tippy-content', 'Usuário resetado aguardando acesso');
                                            $('#iconStatus_' + id).removeClass('fa-ban').removeClass('fa-check-circle').addClass('fa-spinner');

                                            // reload tippy
                                            tippy('[data-tippy-content]');

                                            toastr.success('A senha do usuário foi alterada com sucesso!', 'Sucesso!', {timeOut: 3000});
                                        } else {

                                            toastr.error('Você não tem permissão para resetar senhas!', 'Falha!', {timeOut: 3000});

                                        }
                                    },
                                    error: function () {

                                        // alert de erro
                                        toastr.error('Não foi possível alterar a senha do usuário!', 'Falha!', {timeOut: 3000});

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

        });
    </script>

@endsection
