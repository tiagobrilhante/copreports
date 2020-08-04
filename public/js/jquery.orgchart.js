(function ($) {
    $.fn.orgChart = function (options) {
        var opts = $.extend({}, $.fn.orgChart.defaults, options);
        return new OrgChart($(this), opts);
    }

    $.fn.orgChart.defaults = {
        data: [{
            id: 1,
            name: 'Clique aqui para adicionar a OM pai',
            sigla: 'Pai',
            cor: '#000000',
            parent: 0,
            podeVerTudo: false
        }],
        showControls: false,
        allowEdit: true,
        onAddNode: null,
        onDeleteNode: null,
        onClickNode: null,
        newNodeText: 'Adicione uma Om subordinada'
    };

    function OrgChart($container, opts) {
        var data = opts.data;
        var nodes = {};
        var rootNodes = [];
        this.opts = opts;
        this.$container = $container;
        var self = this;
        var finalColor = '';

        // armazena os dados inicias para serem usados em caso de cancelamento de edição (sem necessidade de buscar no servido)
        var dadoInicial = [];

        this.draw = function () {

            $container.empty().append(rootNodes[0].render(opts));

            $container.find('.node').click(function () {
                if (self.opts.onClickNode !== null) {
                    self.opts.onClickNode(nodes[$(this).attr('node-id')]);
                }
            });

            // botão para editar
            if (opts.allowEdit) {
                $container.find('.node .org-edit-button').click(function (e) {
                    var thisId = $(this).parent().attr('node-id');

                    self.startEdit(thisId);
                    e.stopPropagation();
                });
            }

            // add "add button" listener
            $container.find('.org-add-button').click(function (e) {
                var thisId = $(this).parent().attr('node-id');

                if (self.opts.onAddNode !== null) {
                    self.opts.onAddNode(nodes[thisId]);
                } else {
                    self.newNode(thisId);
                }
                e.stopPropagation();
            });

            // click btn del
            $container.find('.org-del-button').click(function (e) {
                var thisId = $(this).parent().attr('node-id');


                if (self.opts.onDeleteNode !== null) {
                    self.opts.onDeleteNode(nodes[thisId]);
                } else {
                    self.deleteNode(thisId);
                }
                e.stopPropagation();
            });

        }

        this.startEdit = function (id) {

            // pega o valor inicial de nome
            var nomeInicial = $('#nameElement_' + id + ' h2').text();

            // pega o valor inicial de sigla
            var siglaInicial = $('#siglaElement_' + id + ' h6').text();

            // cria a variável que vai armazenar a cor inicial do elemento
            const initialColor = rgb2hex($container.find('#colorSpace_' + id).css('background-color'));

            // verifica o pode ver tudo inicial
            const podeVerTudoInicial = $('#podeVerTudo_' + id).is(':checked');

            // verifica se pode criar relatório inicial
            const podeCriarRelatorioInicial = $('#podeCriarRelatorio_' + id).is(':checked');

            // verifica se pode homologar relatório inicial
            const podeHomologarRelatorioInicial = $('#podeHomologarRelatorio_' + id).is(':checked');

            // verifica se pode criar relatório inicial
            const podeCriarMasterInicial = $('#podeCriarMaster_' + id).is(':checked');

            // adicina a array de controle
            dadoInicial.push(nomeInicial, siglaInicial, initialColor, podeVerTudoInicial, podeCriarRelatorioInicial, podeHomologarRelatorioInicial , podeCriarMasterInicial);

            //input para o nome da OM
            var inputElement = $('<div class="container-fluid">' +
                '<div class="form-group">' +
                '<label for="nomeOm_' + nodes[id].data.id + '">Nome da Om</label>' +
                '<input autofocus id="nomeOm_' + nodes[id].data.id + '" placeholder="Digite o nome da Om" ' +
                'class="form-control form-control-sm" type="text" value="' + nomeInicial + '">' +
                '</div>' +
                '</div>');

            // input para a sigla da OM
            var inputSigla = $('<div class="container-fluid">' +
                '<div class="form-group">' +
                '<label for="siglaOm_' + nodes[id].data.id + '">Sigla da Om</label>' +
                '<input id="siglaOm_' + nodes[id].data.id + '" placeholder="Digite a sigla da Om" ' +
                'class="form-control form-control-sm" type="text" value="' + siglaInicial + '">' +
                '</div>' +
                '</div>');

            // input para cor
            var inputColor = '<div id="theColorSpace"><div class="row"><div class="offset-4 align-content-center"></div>' +
                '<div class=" p-2 picker"></div></div></div>';

            // input para subordinação

            if (nodes[id].data.om_id != null) {

                var ajusteOptions = '';

                for (let i = 0; i < data.length; i++) {

                    if (data[i].id != nodes[id].data.id) {

                        if (data[i].id == nodes[id].data.parent) {

                            ajusteOptions = ajusteOptions + '<option selected value="' + data[i].id + '">' + data[i].sigla + '</option>';

                        } else {

                            ajusteOptions = ajusteOptions + '<option value="' + data[i].id + '">' + data[i].sigla + '</option>';

                        }
                    }

                }

                var inputSubordinação = $('<div class="container-fluid" id="leSubord">' +
                    '<div class="form-group">' +
                    '<label for="subordinacao_' + nodes[id].data.id + '">Subordinação direta</label>' +
                    '<select id="subordinacao_' + nodes[id].data.id + '" class="form-control form-control-sm">' + ajusteOptions + '</select>' +
                    '</div>');

                //subordinação pelo input
                $container.find('#subordinacaoSpace_' + id).replaceWith(inputSubordinação);

            }


            // nome (troca pelo input)
            $container.find('div[node-id=' + id + '] h2').replaceWith(inputElement);
            // sigla (troca pelo input)
            $container.find('div[node-id=' + id + '] h6').replaceWith(inputSigla);
            //cor pelo input
            $container.find('#colorSpace_' + id).replaceWith(inputColor);


            // monta a colorpick
            var colorPicker = new iro.ColorPicker(".picker", {
                width: 90,
                sliderSize: 10,
                handleRadius: 5,
                display: 'block',
                borderWidth: 1,
                borderColor: '#534646',
                layoutDirection: 'vertical',
                // injeta a cor inicial
                color: initialColor
            });

            colorPicker.on(['color:init', 'color:change'], function (color) {
                // modifica a cor final para a cor escolhida no colorpick
                finalColor = color.hexString;
            });

            // sensação de disabled para os outros nós
            $container.find('.node').each(function () {

                $(this).addClass('disableColor');

            });


            if (nodes[id].data.om_id != null) {
                // muda o tamanho pra caber tudo e remove a classe de disable
                $container.find('div[node-id=' + id + ']').addClass('expandForInput').removeClass('disableColor');
            } else {
                // muda o tamanho pra caber tudo e remove a classe de disable
                $container.find('div[node-id=' + id + ']').addClass('expandForInputMaster').removeClass('disableColor');
            }

            // checkbox pode ver tudo permite edição
            $container.find('#podeVerTudo_' + id).attr('disabled', false);

            // checkbox podeCriarRelatorio permite edição
            $container.find('#podeCriarRelatorio_' + id).attr('disabled', false);

            // checkbox podeHomologarRelatorio permite edição
            $container.find('#podeHomologarRelatorio_' + id).attr('disabled', false);

            // checkbox podeCriarMaster permite edição
            $container.find('#podeCriarMaster_' + id).attr('disabled', false);

            // Esconde o botão de editar de todos os nós
            $container.find('.org-edit-button').each(function () {

                $(this).addClass('d-none');

            });

            // esconde o botão de excluir de todos os nós
            $container.find('.org-del-button').each(function () {

                $(this).addClass('d-none');

            });

            // esconde o botão de adicionar nó de todos os nós
            $container.find('.org-add-button').each(function () {

                $(this).addClass('d-none');

            });

            // mostra o botão salvar edição (apenas para o nó em evidência)
            $container.find('div[data-button-id=' + id + ']').removeClass('d-none');


        }

        var hexDigits = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f"];

        //Function to convert rgb color to hex format
        function rgb2hex(rgb) {
            rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
            return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
        }

        function hex(x) {
            return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
        }

        // clica para salvar as alterações
        $(document).on('click', '.salvante', function (e) {

            let nodeIdReference = $(this).attr('id').split('_')[1];

            e.stopPropagation();

            commitChange(nodeIdReference, finalColor);


        });

        // clica para cancelar as alterações
        $(document).on('click', '.cancelante', function (e) {

            let nodeIdReference = $(this).attr('id').split('_')[1];

            e.stopPropagation();

            if (nodes[nodeIdReference].data.novoNo) {

                var thisId = nodeIdReference;

                if (self.opts.onDeleteNode !== null) {
                    self.opts.onDeleteNode(nodes[thisId]);
                } else {
                    self.deleteNode(thisId);
                }
                e.stopPropagation();

            } else {

                // dado inicial
                /*
                0 - nome
                1 - sigla
                2 - cor
                3 - podevertudo
                4- é pef

                 */

                var valorNameIni = dadoInicial[0];
                var valorSiglaIni = dadoInicial[1];
                var valorCorIni = dadoInicial[2];
                var valorPodeVerTudoIni = dadoInicial[3];
                var valorPodeCriarRelatorioIni = dadoInicial[4];
                var valorPodeHomologarRelatorioIni = dadoInicial[5];
                var valorPodeCriarMasterIni = dadoInicial[6];


                var h2Element = $('<span id="nameElement_' + nodeIdReference + '"><h2>' + valorNameIni + '</h2></span>');
                var h6Element = $('<span id="siglaElement_' + nodeIdReference + '"><h6><br>' + valorSiglaIni + '</h6></span>');
                var colorElement = $('<span id="colorSpace_' + nodeIdReference + '" class="corbox" style="background-color: ' + valorCorIni + '"></span>');
                var subordinacaoElement = $('<span id="subordinacaoSpace_' + nodeIdReference + '"></span>');

                var spanNameElement = $container.find('#nameElement_' + nodeIdReference);
                var spanSiglaElement = $container.find('#siglaElement_' + nodeIdReference);
                var spanColorElement = $container.find('#theColorSpace');
                var spanSubordinacaoElement = $container.find('#leSubord');

                // troca pelo novo nome
                spanNameElement.replaceWith(h2Element);

                // troca pela nova sigla
                spanSiglaElement.replaceWith(h6Element);

                // troca pela nova cor
                spanColorElement.replaceWith(colorElement);

                // troca pelo espaço de subordinação
                spanSubordinacaoElement.replaceWith(subordinacaoElement);

                // desabilita o pode ver tudo
                // se o podever tudo é false tem que deixar sem o check

                if (valorPodeVerTudoIni) {

                    $container.find('#podeVerTudo_' + nodeIdReference).prop('checked', true).attr('disabled', true);

                } else {
                    $container.find('#podeVerTudo_' + nodeIdReference).prop('checked', false).attr('disabled', true);
                }

                // desabilita o podeCriarRelatorio
                // se opodeCriarRelatorio é false tem que deixar sem o check

                if (valorPodeCriarRelatorioIni) {

                    $container.find('#podeCriarRelatorio_' + nodeIdReference).prop('checked', true).attr('disabled', true);
                } else {
                    $container.find('#podeCriarRelatorio_' + nodeIdReference).prop('checked', false).attr('disabled', true);
                }

                // desabilita o podeHomologarRelatorio
                // se podeHomologarRelatorio é false tem que deixar sem o check

                if (valorPodeHomologarRelatorioIni) {

                    $container.find('#podeHomologarRelatorio_' + nodeIdReference).prop('checked', true).attr('disabled', true);
                } else {
                    $container.find('#podeHomologarRelatorio_' + nodeIdReference).prop('checked', false).attr('disabled', true);
                }

                // desabilita o podeCriarMaster
                // se opodeCriarMaster é false tem que deixar sem o check

                if (valorPodeCriarMasterIni) {

                    $container.find('#podeCriarMaster_' + nodeIdReference).prop('checked', true).attr('disabled', true);
                } else {
                    $container.find('#podeCriarMaster_' + nodeIdReference).prop('checked', false).attr('disabled', true);
                }

                // altera para compactar
                $container.find('div[node-id=' + nodeIdReference + ']').removeClass('expandForInput').removeClass('expandForInputMaster');

                // oculta o botão de salvar
                $container.find('div[data-button-id=' + nodeIdReference + ']').addClass('d-none');


                // mostra os botões de editar
                $container.find('.org-edit-button').each(function () {

                    $(this).removeClass('d-none');

                });

                // mostra novamente o botão de excluir OM
                $container.find('.org-del-button').each(function () {

                    $(this).removeClass('d-none');

                });

                // mostra novamente o botão de adicionar filho
                $container.find('.org-add-button').each(function () {

                    $(this).removeClass('d-none');

                });

                // remove sensação de disabled para os nós
                $container.find('.node').each(function () {

                    $(this).removeClass('disableColor');

                });


            }


            dadoInicial = [];


        });

        // salva as alterações nos nós
        function commitChange(id, theColor) {

            const valorInputName = $('#nomeOm_' + nodes[id].data.id).val();

            const valorInputSigla = $('#siglaOm_' + nodes[id].data.id).val();

            let valorPodeVerTudo = '';
            let valorPodeCriarRelatorio = '';
            let valorPodeHomologarRelatorio = '';
            let valorPodeCriarMaster = '';

            if ($('#podeVerTudo_' + id).is(':checked')) {
                valorPodeVerTudo = 1;
            } else {
                valorPodeVerTudo = 0;
            }

            if ($('#podeCriarRelatorio_' + id).is(':checked')) {
                valorPodeCriarRelatorio = 1;
            } else {
                valorPodeCriarRelatorio = 0;
            }

            if ($('#podeHomologarRelatorio_' + id).is(':checked')) {
                valorPodeHomologarRelatorio = 1;
            } else {
                valorPodeHomologarRelatorio = 0;
            }

            if ($('#podeCriarMaster_' + id).is(':checked')) {
                valorPodeCriarMaster = 1;
            } else {
                valorPodeCriarMaster = 0;
            }

            let subordinacao = '';

            if (nodes[id].data.novoNo){

                subordinacao = nodes[id].data.parent;

            } else {

                subordinacao = $('#subordinacao_' + id).val();


            }



            $.ajax({
                type: 'POST',
                url: '/ommanager/' + id,
                data: {
                    _method: 'PUT',
                    _token: $('meta[name=csrf-token]').attr('content'),
                    name: valorInputName,
                    sigla: valorInputSigla,
                    cor: theColor,
                    podeVerTudo: valorPodeVerTudo,
                    podeCriarRelatorio: valorPodeCriarRelatorio,
                    podeHomologarRelatorio: valorPodeHomologarRelatorio,
                    podeCriarMaster: valorPodeCriarMaster,
                    novoNo: nodes[id].data.novoNo,
                    parent: subordinacao,
                    om_id: subordinacao,

                },
                beforeSend: function () {

                    $('#orgChartContainer').LoadingOverlay("show");

                },
                success: function () {

                    // alerta de sucesso
                    toastr.success('A Om foi alterada com sucesso!', 'Sucesso!');

                    location.reload();

                },
                error: function (data) {

                    console.log(data);

                    toastr.error('Não foi possível alterar a Om!', 'Falha!');

                },
                complete: function () {

                    dadoInicial = [];

                    $('#orgChartContainer').LoadingOverlay("hide");

                }

            });

        }

        //inicializa os dados de um novo nó
        this.newNode = function (parentId) {
            var nextId = Object.keys(nodes).length;
            while (nextId in nodes) {
                nextId++;
            }

            self.addNode({
                id: nextId,
                name: '',
                sigla: '',
                cor: '#000000',
                podeVerTudo: '',
                podeCriarRelatorio: '',
                podeHomologarRelatorio: '',
                podeCriarMaster: '',
                parent: parentId,
                novoNo: true
            });
        }

        // adiciona o novo nó
        this.addNode = function (data) {
            var newNode = new Node(data);
            nodes[data.id] = newNode;
            nodes[data.parent].addChild(newNode);

            self.draw();
            self.startEdit(data.id);
        }

        // deleta o nó
        this.deleteNode = function (id) {


            if (nodes[id].data.novoNo){

                nodes[nodes[id].data.parent].removeChild(id);
                delete nodes[id];
                self.draw();

            } else {

            $.confirm({
                title: 'Você está certo disso?',
                content: 'Esta ação é permanente, e removerá esta Om, e todas as Om subordinadas!',
                buttons: {
                    Confirmar: {
                        action: function () {
                            $.ajax({
                                type: 'POST',
                                url: '/ommanager/' + id,

                                data: {
                                    _method: 'DELETE',
                                    _token: $('meta[name=csrf-token]').attr('content'),

                                },
                                beforeSend: function () {

                                    $('#orgChartContainer').LoadingOverlay("show");

                                },
                                success: function (data) {

                                    if (data == 'sucesso') {

                                        // remove nodes
                                        nodes[nodes[id].data.parent].removeChild(id);
                                        delete nodes[id];
                                        self.draw();

                                        // alerta de sucesso
                                        toastr.success('A Om foi excluída com sucesso!', 'Sucesso!');

                                    } else {

                                        const mensagem = data.split('_')[1];

                                        toastr.error(mensagem, 'Falha!');

                                    }


                                },
                                error: function (data) {

                                    console.log(data);

                                    // alert de erro
                                    toastr.error('Não foi possível excluir a Om!', 'Falha!');

                                },
                                complete: function () {

                                    $('#orgChartContainer').LoadingOverlay("hide");

                                },

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
        }

        // traz informações sobre o nó
        this.getData = function () {
            var outData = [];
            for (var i in nodes) {
                outData.push(nodes[i].data);
            }
            return outData;
        }

        // constructor
        for (var i in data) {
            var node = new Node(data[i]);
            nodes[data[i].id] = node;
        }

        // generate parent child tree
        for (var i in nodes) {
            if (nodes[i].data.parent == 0) {
                rootNodes.push(nodes[i]);
            } else {
                nodes[nodes[i].data.parent].addChild(nodes[i]);
            }
        }

        // draw org chart
        $container.addClass('orgChart');
        self.draw();

    }

    // functions dos nós
    function Node(data) {
        this.data = data;
        this.children = [];
        var self = this;

        // adicionar nó
        this.addChild = function (childNode) {
            this.children.push(childNode);
        }

        // remover nó filhos
        this.removeChild = function (id) {
            for (var i = 0; i < self.children.length; i++) {
                if (self.children[i].data.id == id) {
                    self.children.splice(i, 1);
                    return;
                }
            }
        }

        // renderiza o espaço dos nós
        this.render = function (opts) {
            var childLength = self.children.length,
                mainTable;

            mainTable = "<table cellpadding='0' cellspacing='0' border='0'>";
            var nodeColspan = childLength > 0 ? 2 * childLength : 2;
            mainTable += "<tr><td colspan='" + nodeColspan + "'>" + self.formatNode(opts) + "</td></tr>";

            if (childLength > 0) {
                var downLineTable = "<table cellpadding='0' cellspacing='0' border='0'><tr class='lines x'><td class='line left half'></td><td class='line right half'></td></table>";
                mainTable += "<tr class='lines'><td colspan='" + childLength * 2 + "'>" + downLineTable + '</td></tr>';

                var linesCols = '';
                for (var i = 0; i < childLength; i++) {
                    if (childLength == 1) {
                        linesCols += "<td class='line left half'></td>";    // keep vertical lines aligned if there's only 1 child
                    } else if (i == 0) {
                        linesCols += "<td class='line left'></td>";     // the first cell doesn't have a line in the top
                    } else {
                        linesCols += "<td class='line left top'></td>";
                    }

                    if (childLength == 1) {
                        linesCols += "<td class='line right half'></td>";
                    } else if (i == childLength - 1) {
                        linesCols += "<td class='line right'></td>";
                    } else {
                        linesCols += "<td class='line right top'></td>";
                    }
                }
                mainTable += "<tr class='lines v'>" + linesCols + "</tr>";

                mainTable += "<tr>";
                for (var i in self.children) {
                    mainTable += "<td colspan='2'>" + self.children[i].render(opts) + "</td>";
                }
                mainTable += "</tr>";
            }
            mainTable += '</table>';
            return mainTable;
        }

        // renderiza os nós
        this.formatNode = function (opts) {

            // variáveis declaradas
            var nameString = '',
                descString = '',
                siglaString = '',
                corString = '',
                podeVerTudoBoolean = '',
                subordinacaoString = '';


            // name
            if (typeof data.name !== 'undefined') {
                nameString = '<span id="nameElement_' + self.data.id + '"><h2>' + self.data.name + '</h2></span>';
            }

            //sigla
            if (typeof data.sigla !== 'undefined') {
                siglaString = '<span id="siglaElement_' + self.data.id + '"><h6><br>' + self.data.sigla + '</h6></span>';
            }

            //cor
            if (typeof data.cor !== 'undefined') {
                corString = '<br>Cor: <span id="colorSpace_' + self.data.id + '" class="corbox" style="background-color: ' + self.data.cor + '"></span>';
            }

            //pode ver tudo e demais options
            if (typeof data.podeVerTudo !== 'undefined' || typeof data.podeCriarRelatorio !== 'undefined' || typeof data.podeHomologarRelatorio !== 'undefined' || typeof data.podeCriarMaster !== 'undefined') {

                let inputAttributeVer = '';
                let inputAttributpodeCriarRelatorio = '';
                let inputAttributpodeHomologarRelatorio = '';
                let inputAttributpodeCriarMaster = '';
                if (data.podeVerTudo == true) {
                    inputAttributeVer = 'checked';
                }
                if (data.podeCriarRelatorio == true) {
                    inputAttributpodeCriarRelatorio = 'checked';
                }
                if (data.podeHomologarRelatorio == true) {
                    inputAttributpodeHomologarRelatorio = 'checked';
                }
                if (data.podeCriarMaster == true) {
                    inputAttributpodeCriarMaster = 'checked';
                }
                podeVerTudoBoolean = ' <div class="form-group form-check-inline">' +
                    '<input disabled type="checkbox" class="form-check-input" id="podeVerTudo_' + data.id + '" ' + inputAttributeVer + '>' +
                    '<label class="form-check-label" for="podeVerTudo_' + data.id + '">Pode ver tudo.</label>' +
                    '</div>' +
                    '<div class="form-check form-check-inline">' +
                    '<input disabled class="form-check-input" type="checkbox" id="podeCriarMaster_' + data.id + '" ' + inputAttributpodeCriarMaster + ' >' +
                    '<label class="form-check-label" for="podeCriarMaster_' + data.id + '">Pode Criar Master</label>' +
                    '</div><br>'+
                    '<div class="form-check form-check-inline">' +
                    '<input disabled class="form-check-input" type="checkbox" id="podeCriarRelatorio_' + data.id + '" ' + inputAttributpodeCriarRelatorio + ' >' +
                    '<label class="form-check-label" for="podeCriarRelatorio_' + data.id + '">Pode Criar Relatório</label>' +
                    '</div>'+
                    '<div class="form-check form-check-inline">' +
                    '<input disabled class="form-check-input" type="checkbox" id="podeHomologarRelatorio_' + data.id + '" ' + inputAttributpodeHomologarRelatorio + ' >' +
                    '<label class="form-check-label" for="podeHomologarRelatorio_' + data.id + '">Homologa Rel</label>' +
                    '</div><br>';


            }

            // subordinação
            if (typeof data.parent !== 'undefined') {
                subordinacaoString = '<span id="subordinacaoSpace_' + self.data.id + '"></span>';
            }

            // description
            if (typeof data.description !== 'undefined') {
                descString = '<p>' + 'self.data.description' + '</p>';
            }


            // botão salvar e cancelar
            var saveEditButton = '<div class="mt-2 d-none" data-button-id="' + self.data.id + '">' +
                '<div class="container-fluid">' +
                '<div class="row">' +
                '<div class="col">' +
                '<button class="salvante btn btn-sm btn-primary btn-block" id="salvar_' + self.data.id + '">Salvar</button>' +
                '</div>' +
                '<div class="col">' +
                '<button class="cancelante btn btn-sm btn-danger btn-block" id="cancelar_' + self.data.id + '">Cancelar</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            // controls
            if (opts.showControls) {

                let delButton = '';

                if (data.parent != 0) {
                    delButton = "<div class='org-del-button'><i class='fa fa-trash'></i></div>";
                }

                var buttonsHtml = "<div class='org-add-button'><i class='fa fa-plus-circle'></i> " + opts.newNodeText + "</div>" + delButton + "<div class='org-edit-button'><i class='fa fa-edit'></i> </div>";
            } else {
                buttonsHtml = '';
            }

            // monta a view
            return "<div class='node' node-id='" + this.data.id + "'>" + nameString + siglaString + descString + podeVerTudoBoolean + subordinacaoString + corString + saveEditButton + buttonsHtml + "</div>";

        }

    }

})(jQuery);

