@foreach ($cardsList as $status => $card)
<div class="col-sm-6 col-md-3">
    <!-- STATUS -->
    <!-- *************************************************** -->
    <div class="panel panel-{{$statusList[$status]}} coluna">
        <div class="panel-heading">
            <p class="panel-title">
                <?php echo $status ?>
                <span class="badge badge-num-cards">
                        @if($cardsList[$status])
                        {{count($cardsList[$status])}}
                        @else
                        0
                        @endif
                </span>
            </p>
        </div>
        <div id="cards-{{$status}}" class="panel-body">
            @if($cardsList[$status])
            @foreach($cardsList[$status] as $card)
            <div class="panel panel-default card {{$card['id_curso'] == null ? 'aulao' : ''}}">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-9">
                            @if($card['id_curso'] == null)
                            <h5>AULÃO</h5>
                            @else
                            <h5>{{$card['curso']['curso']}}</h5>
                            @endif
                            <div class="wrapper-professores">
                                @foreach($card['professores'] as $professor)
                                <span class="label">{{$professor['nome']}}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-3 text-right">
                            <span class="label label-primary label-num-aula">A{{$card['num_aula']}}</span>
                            <span class="label label-success label-ano">{{$card['ano']}}</span>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <!-- OS ÍCONES VÊM DA TABELA "material" DO BANCO DE DADOS -->
                    @foreach($card['materiais'] as $material)
                        <span class="glyphicon {{$material['icone']}}" data-toggle="tooltip" data-placement="top" title="{{$material['material']}}" style="margin-right: 6px"></span>
                        @endforeach
                    <div class="dropdown pull-right">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-move"></span>
                            Mover <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">Ações</li>
                            <li role="separator" class="divider"></li>
                            @if($card['status']['status'] != 'Conferido')
                            <li><a href="" onclick="prosseguir({{$card['id_card']}});return false;">&raquo; Prosseguir</a></li>
                            @endif
                            <li role="separator" class="divider"></li>
                            @if($card['status']['status'] != 'Demanda')
                            <li><a href="" onclick="voltar({{$card['id_card']}});return false;">&laquo; Voltar</a></li>
                            @endif
                        </ul>
                    </div>
                    <a  onclick="obterCartaoPorId({{$card['id_card']}})" class="pull-right"  style="margin-right: 4px">
                        <span class="glyphicon glyphicon-eye-open"></span> Visualizar
                    </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endforeach
