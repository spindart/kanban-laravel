<div class="modal-body" id="form-card-conteudo">
    <div class="row">
        <div class="col-xs-8">
            <label>Registro</label>
        </div>
        <div class="col-xs-2">
            <label>Nº Aula</label>
        </div>
        <div class="col-xs-2">
            <label>Ano</label>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <span class="glyphicon glyphicon-calendar" aria-label="hidden"></span>
            <?php
                        $data = DateTime::createFromFormat('Y-m-d H:i:s', $dt_registro);
                        ?>
            {{$data->format("d/m/Y")}}
            <span style="margin-left:10px;" class="glyphicon glyphicon-time" aria-label="hidden"></span>
            {{$data->format("H:i")}}
        </div>
        <div class="col-xs-2">
            <span id="num_aula_modal" class="label label-primary">A{{$num_aula}}</span>

        </div>
        <div class="col-xs-2">
            <span id="ano_aula_modal" class="label label-success">{{$ano}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div style="margin-top:20px;" class="well well-sm">
                <label>Curso</label>
                @if(!isset($id_curso)) <div class="aulao-modal">

                    <h5>AULÃO</h5>

                </div>
                @else
                <div class="curso-modal">
                    <h5>{{$curso['curso']}}</h5>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#professores">
                        <span class="glyphicon glyphicon-user"></span>
                        Professores</a></li>
            </ul>

            <div class="tab-content">
                <div id="professores" class="tab-pane fade in active">
                    <div class="wrapper-professores">
                        @foreach ($professores as $professor)
                        <span class="label">{{$professor['nome']}}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs mt-20">
                <li class="active"><a data-toggle="tab" href="#materiais">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        Materiais</a></li>
            </ul>

            <div class="tab-content">
                <div id="materiais" class="tab-pane fade in active">
                    <div class="wrapper-materiais">
                        @foreach ($materiais as $material)
                        <span class="label"><span class="glyphicon {{$material['icone']}}" style="margin-right: 6px"></span>{{$material['material']}}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <span class="label label-{{$status['cor']}} pull-left modal-status"> <span class="glyphicon glyphicon-pushpin"></span> {{$status['status']}}</span>
    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
</div>
