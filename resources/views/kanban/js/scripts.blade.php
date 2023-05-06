<script>
    function prosseguir(idCard) {
        hideAlerts()
        var dialog = bootbox.dialog({
            title: 'Aguarde um momento, carregando informações...',
            message: '<p>Carregando...</p>'
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                _token: "{{ csrf_token() }}",
                idCard: idCard
            },
            url: `prosseguir`,
            success: function(conteudo) {
                if (conteudo) {
                    filter()
                    if(conteudo.erro){
                        $("#alert").addClass('alert-danger');
                        $("#alert").removeClass('alert-success');
                        $("#alert").addClass('alert-danger');
                        $("#alert").text(conteudo.msg);
                        $("#alert").show();
                    }
                    if(!conteudo.erro){
                        $("#alert").addClass('alert-success');
                        $("#alert").removeClass('alert-danger');
                        $("#alert").text(conteudo.msg);
                        $("#alert").show();
                    }
                } else {
                    bootbox.dialog({
                        title: 'Erro',
                        message: 'Erro ao localizar Card'
                    });
                }
                dialog.modal('hide');
            }
        });
    }

function voltar(idCard) {
    hideAlerts()
    var dialog = bootbox.dialog({
        title: 'Aguarde um momento, carregando informações...',
        message: '<p>Carregando...</p>'
    });
    $.ajax({
        type: "POST",
        dataType: "json",
        data: {
            _token: "{{ csrf_token() }}",
            idCard: idCard
        },
        url: `voltar`,
        success: function(conteudo) {
            if (conteudo) {
                filter()
            } else {
                bootbox.dialog({
                    title: 'Erro',
                    message: 'Erro ao localizar Card'
                });
            }
            dialog.modal('hide');
        }
    });
}

function getFiltersInput(){
    let data = [];
   data =  {
    cursos: $('#select-filtro-curso').val(),
            aulas: $('#select-filtro-num-aula').val(),
            professor: $("#input-filtro-professor").val(),
            orderBy: $("#select-filtro-ordenar-por").val(),
            order: $("#select-filtro-ordenar").val(),
            _token: "{{ csrf_token() }}"
        }
        return data
}

function obterCartaoPorId(idCard) {
    hideAlerts()
    var dialog = bootbox.dialog({
        title: 'Aguarde um momento, carregando informações...',
        message: '<p>Carregando...</p>'
    });
    $.ajax({
        type: "GET",
        dataType: "json",
        url: `card/${idCard}`,
        success: function(conteudo) {
            if (conteudo) {
                $('#conteudo-card-form').html(conteudo);
                $('#form-card').modal('show');
            } else {
                bootbox.dialog({
                    title: 'Erro',
                    message: 'Erro ao localizar Card'
                });
            }
            dialog.modal('hide');
        }
    });
}

function hideAlerts(){
    $("#alert").hide();
}

function filter() {
    hideAlerts()
    $('#card-colunas').html('')
    let data = getFiltersInput();
    var dialog = bootbox.dialog({
        title: 'Aguarde um momento, carregando informações...',
        message: '<p>Carregando...</p>'
    });
    $.ajax({
        type: "post",
        dataType: "json",
        url: 'cards',
        data: data,
        success: function(conteudo) {
            if (conteudo.html) {
                $('#card-colunas').html(conteudo.html);

                let selectedItem = $('#select-filtro-num-aula').val();
                $('#select-filtro-num-aula').html("");
                $.each(conteudo.num_aulas, function(index, value) {
                    if(selectedItem !== null){
                    if(selectedItem.includes(index)){

                    $('#select-filtro-num-aula').append(new Option(value, index, true, true));
                    }else{
                        $('#select-filtro-num-aula').append(new Option(value, index, true, false));

                    }
                }else{
                    $('#select-filtro-num-aula').append(new Option(value, index, true, false));

                }
                });
                $('#select-filtro-num-aula').selectpicker('refresh');
            } else {
                bootbox.dialog({
                    title: 'Erro',
                    message: 'Erro!'
                });
            }
            $('[data-toggle="tooltip"]').tooltip();
            dialog.modal('hide');
        }
    });
}
</script>
