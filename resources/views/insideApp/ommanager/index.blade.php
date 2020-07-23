@extends('layouts.insideApp.app')

@section('content')

    <div class="card mb-3">
        <div class="card-header">{{ __('Gerenciamento de Organizações Militares') }}</div>

        <div class="card-body ">

            {{--espaço do chart--}}


            <div class="container bordas">
            <div class="row ">

                <div class="col-12 scroll">



                    <div id="orgChartContainer">
                        <div id="orgChart" ></div>
                    </div>
                    </div>




            </div>
            </div>



        </div>

    </div>

@endsection

@section('myScripts')

    {{--colorpick--}}
    <script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5"></script>

    {{--orgchart modificado--}}
    <script src="{{ asset('js/jquery.orgchart.js') }}" defer></script>

    <script>

        $(function () {

            // carrega as informações do banco (OM)
            $.ajax({
                type: 'GET',
                url: '/allOm',

                success: function (data) {

                    org_chart = $('#orgChart').orgChart({
                        data: data,
                        showControls: true,
                        allowEdit: true,
                        onAddNode: function (node) {
                            org_chart.newNode(node.data.id);
                        },
                        onDeleteNode: function (node) {

                            org_chart.deleteNode(node.data.id);
                        },
                        onClickNode: function (node) {

                        }

                    });

                },
                error: function (data) {

                    // alert de erro
                    toastr.error('Não foi possível obter as informações!', 'Falha!');

                }

            });

        });
    </script>

@endsection
