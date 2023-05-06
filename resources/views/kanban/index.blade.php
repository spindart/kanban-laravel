@extends('kanban.layouts.template')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label class="control-label">Curso</label>
                <select id="select-filtro-curso" onchange="filter()" title="Cursos" class="form-control selectpicker" multiple data-live-search="true" data-width="100%">
                    @foreach($coursesList as $idCurso => $course)
                    <option value="{{$idCurso}}">{{$course}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-2 col-md-1">
            <div class="form-group">
                <label class="control-label">Nº Aula</label>
                <select id="select-filtro-num-aula" onchange="filter()" class="form-control selectpicker" multiple title="Aula" data-live-search="true" data-width="100%">
                    @foreach($num_aulas as $num_aula)
                    <option value="{{$num_aula}}">{{$num_aula}}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label class="control-label">Professor</label>
                <div class="input-group">
                    <input id="input-filtro-professor" type="text" class="form-control" />
                    <span class="input-group-addon">
                        <a href=""> <span onclick="filter();return false;" class="glyphicon glyphicon-search"></span></a>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label class="control-label">Ordenar por</label>
                <select id="select-filtro-ordenar-por" onchange="filter()" class="form-control">
                    <option value="ano">Ano</option>
                    <option value="curso">Curso</option>
                    <option value="professor">Professor</option>
                    <option value="num_aula">Nº Aula</option>
                </select>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label class="control-label">&nbsp;</label>
                <select id="select-filtro-ordenar" onchange="filter()" class="form-control">
                    <option value="asc">Crescente</option>
                    <option value="desc">Decrescente</option>
                </select>
            </div>
        </div>
    </div>
    <div class="alert" id="alert" style="display:none;" role="alert">
    </div>

    <div class="row card-colunas" id="card-colunas">
        <?php echo $html ?>
    </div>

</div>

<div id="form-card" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="form-card" aria-hidden="true">
    <div class="modal-dialog modal-fluid">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Visualização do Card</h4>
            </div>
            <div id="conteudo-card-form">

            </div>
        </div>
    </div>
</div>
@include('kanban.js.scripts')

@endsection
