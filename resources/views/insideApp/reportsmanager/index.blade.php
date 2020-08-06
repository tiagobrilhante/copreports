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

                        <h5 id="h5_principal">Missões de emprego cadastradas</h5>


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
                                           id="edit_{{$missaoEmprego->id}}"><i class="fa fa-edit"></i></a>

                                        <span class="separaicon"></span>

                                        <a href="#" class="link-simples btn_excludente"
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


                                        <small id="me_help" class="form-text text-muted">Altere a missão de emprego se
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
                                            class="fa fa-edit"></i></a>
                                    <a href="#" class="link-simples btn_si_cancelante d-none" id="cancelsi_"><i
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





@endsection

@section('myScripts')


    <script>
        $(function () {


            //Function to convert rgb color to hex format
            var hexDigits = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f"];

            function rgb2hex(rgb) {
                rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
                return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
            }

            function hex(x) {
                return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
            }

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

                if($('.le_array_si').length > 0){
                    le_su_itens=[];

                    for (let i = 0; i < $('.le_array_si').length; i++) {

                        le_su_itens.push($('.le_array_si').eq(i).val())

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

                        console.log(data);

                        let tem_si = '';
                        let quais_si = '';
                        if (data.sub_itens.length = 0) {
                            tem_si = 'd-none';

                            /// montador de li

                            for (let i = 0; i < data.sub_itens.length; i++) {

                                quais_si += '<li class="lililist_' + data.id + '" id = "itemsilist_' + data.sub_itens.id + '" >' + data.sub_itens.sub_item + ' <span class="bola" style = "background-color: ' + data.sub_itens.cor + ';" > < /span></li>';

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
                            '<a href="#" class="link-simples btn_editante" id="edit_' + data.id + '"><i class="fa fa-edit"></i></a>' +
                            '<span class="separaicon"></span>' +
                            '<a href="#" class="link-simples btn_excludente" id="exclude_' + data.id + '"><i class="fa fa-trash"></i></a>' +
                            '</div>' +
                            '</div>' +
                            '<div id="les_si_' + data.id + '" class="' + tem_si + '">' +
                            '<p> Sub Itens </p>' +
                            '<div id = "list_si_for_index_' + data.id + '"><ul>' + quais_si +
                            '</ul>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $('#h5_principal').after(space_for_new_card);

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

                        console.log(data);

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

                        console.log(data);

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

                        console.log(listanova);

                        $('#list_si_for_index_' + data.id).append(listanova);


                        // hide modal


                        $('#altera_me').modal('hide');
                        toastr.success('Missão de emprego alterada com sucesso!', 'Sucesso!');


                    },
                    error: function (data) {

                        console.log(data);

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


        });
    </script>

@endsection
