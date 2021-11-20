$(document).ready(function () {

    /* 
    1º - Se necessário, inserir os JOINS da (query) do datatable
    2º - Altere variavel 'sql_datatables' que conterá o SELECT base do seu datatables. Digite sem a clausula WHERE
    3º - Altere variavel 'filtro' que conterá o filtro inicial do seu datatables. 1=1 para chamar todos os registros OU 0!=0 para não retornar nenhum registro
    4º - Alterar as colunas(columns) do datatable
    5º - Set dos valores do 'Formulário' ao clicar no botão de edição CASE 'U'
    6º - Verificar se os plugins do SELECT2 estão corretos, caso sejam usados
    7º - Configure o 'filtro' ao clicar no botao filtrar, caso exista
    */

    var acoes_registros = $('#acoes_registros').html();
    var acoes_datatables = ($('#acoes_datatables').val()).split(',');
    var sql_datatables =  "SELECT t1.* ,b.descricao banco_descricao, date_format(dt_vencimento,'%d/%m/%Y') dt_vencimento_format, date_format(dt_lancamento,'%d/%m/%Y') dt_lancamento_format FROM " + $('#tabela').val() + " t1 LEFT JOIN banco b ON b.id_banco=t1.id_banco";
    var filtro = "0<>0";  

    $('#acoes_registros').remove();

    //Inicialização do(s) datatable(s)
        var table = $("#datatable").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            "buttons": acoes_datatables,
            ajax: {
                url: "../app/CRUD_basico.php",
                type: 'GET',
                dataType: 'json',
                async: false,
                data: function (d){
                    return $.extend( {}, d, {
                        'query': sql_datatables + ' WHERE ' + filtro,
                    });
                }
            }, 
            columns: [
                { title: "Dt. Lançamento",  data: "dt_lancamento_format",    width: '20%',   type: 'date-eu' },
                { title: "Dt. Vencimento",  data: "dt_vencimento_format",    width: '20%',   type: 'date-eu' },
                { title: "Descrição",       data: "descricao",               width: '30%' },
                { title: "Valor",           data: "valor",                   width: '15%' },
                { title: "Valor Pago",      data: "valor_pago",              width: '15%' },
                { title: "CD",              data: "CD",                      width: '10%' },
                { title: "Tipo",            data: "tipo_pagamento",          width: '10%' },
                {
                    title: "Ações", 
                    targets: -1,
                    data: null,
                    defaultContent: acoes_registros,
                    width: '10%'
                }
            ],
            language: {
                "emptyTable": "Nenhum registro encontrado",
                "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 até 0 de 0 registros",
                "infoFiltered": "(Filtrados de _MAX_ registros)",
                "infoThousands": ".",
                "loadingRecords": "Carregando...",
                "processing": "Processando...",
                "zeroRecords": "Nenhum registro encontrado",
                "search": "_INPUT_",
                "searchPlaceholder": "Pesquisar",
                "paginate": {
                    "next": "Próximo",
                    "previous": "Anterior",
                    "first": "Primeiro",
                    "last": "Último"
                },
                "aria": {
                    "sortAscending": ": Ordenar colunas de forma ascendente",
                    "sortDescending": ": Ordenar colunas de forma descendente"
                },
                "select": {
                    "rows": {
                        "_": "Selecionado %d linhas",
                        "1": "Selecionado 1 linha"
                    },
                    "cells": {
                        "1": "1 célula selecionada",
                        "_": "%d células selecionadas"
                    },
                    "columns": {
                        "1": "1 coluna selecionada",
                        "_": "%d colunas selecionadas"
                    }
                },
                "buttons": {
                    "copySuccess": {
                        "1": "Uma linha copiada com sucesso",
                        "_": "%d linhas copiadas com sucesso"
                    },
                    "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                    "colvis": "Visibilidade da Coluna",
                    "colvisRestore": "Restaurar Visibilidade",
                    "copy": '<i class="fas fa-copy"></i>',
                    "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                    "copyTitle": "Copiar para a Área de Transferência",
                    "csv": '<i class="fas fa-file-csv"></i>',
                    "excel": '<i class="fas fa-file-excel"></i>',
                    "pageLength": {
                        "-1": "Mostrar todos os registros",
                        "_": "Mostrar %d registros"
                    },
                    "pdf": '<i class="fas fa-file-pdf"></i>',
                    "print": '<i class="fas fa-print"></i>'
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Preencher todas as células com",
                    "fillHorizontal": "Preencher células horizontalmente",
                    "fillVertical": "Preencher células verticalmente"
                },
                "lengthMenu": "Exibir _MENU_ resultados por página",
                "searchBuilder": {
                    "add": "Adicionar Condição",
                    "button": {
                        "0": "Construtor de Pesquisa",
                        "_": "Construtor de Pesquisa (%d)"
                    },
                    "clearAll": "Limpar Tudo",
                    "condition": "Condição",
                    "conditions": {
                        "date": {
                            "after": "Depois",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vazio",
                            "equals": "Igual",
                            "not": "Não",
                            "notBetween": "Não Entre",
                            "notEmpty": "Não Vazio"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vazio",
                            "equals": "Igual",
                            "gt": "Maior Que",
                            "gte": "Maior ou Igual a",
                            "lt": "Menor Que",
                            "lte": "Menor ou Igual a",
                            "not": "Não",
                            "notBetween": "Não Entre",
                            "notEmpty": "Não Vazio"
                        },
                        "string": {
                            "contains": "Contém",
                            "empty": "Vazio",
                            "endsWith": "Termina Com",
                            "equals": "Igual",
                            "not": "Não",
                            "notEmpty": "Não Vazio",
                            "startsWith": "Começa Com"
                        },
                        "array": {
                            "contains": "Contém",
                            "empty": "Vazio",
                            "equals": "Igual à",
                            "not": "Não",
                            "notEmpty": "Não vazio",
                            "without": "Não possui"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Excluir regra de filtragem",
                    "logicAnd": "E",
                    "logicOr": "Ou",
                    "title": {
                        "0": "Construtor de Pesquisa",
                        "_": "Construtor de Pesquisa (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Limpar Tudo",
                    "collapse": {
                        "0": "Painéis de Pesquisa",
                        "_": "Painéis de Pesquisa (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Nenhum Painel de Pesquisa",
                    "loadMessage": "Carregando Painéis de Pesquisa...",
                    "title": "Filtros Ativos"
                },
                "thousands": ".",
                "datetime": {
                    "previous": "Anterior",
                    "next": "Próximo",
                    "hours": "Hora",
                    "minutes": "Minuto",
                    "seconds": "Segundo",
                    "amPm": [
                        "am",
                        "pm"
                    ],
                    "unknown": "-",
                    "months": {
                        "0": "Janeiro",
                        "1": "Fevereiro",
                        "10": "Novembro",
                        "11": "Dezembro",
                        "2": "Março",
                        "3": "Abril",
                        "4": "Maio",
                        "5": "Junho",
                        "6": "Julho",
                        "7": "Agosto",
                        "8": "Setembro",
                        "9": "Outubro"
                    },
                    "weekdays": [
                        "Domingo",
                        "Segunda-feira",
                        "Terça-feira",
                        "Quarta-feira",
                        "Quinte-feira",
                        "Sexta-feira",
                        "Sábado"
                    ]
                },
                "editor": {
                    "close": "Fechar",
                    "create": {
                        "button": "Novo",
                        "submit": "Criar",
                        "title": "Criar novo registro"
                    },
                    "edit": {
                        "button": "Editar",
                        "submit": "Atualizar",
                        "title": "Editar registro"
                    },
                    "error": {
                        "system": "Ocorreu um erro no sistema (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Mais informações<\/a>)."
                    },
                    "multi": {
                        "noMulti": "Essa entrada pode ser editada individualmente, mas não como parte do grupo",
                        "restore": "Desfazer alterações",
                        "title": "Multiplos valores",
                        "info": "Os itens selecionados contêm valores diferentes para esta entrada. Para editar e definir todos os itens para esta entrada com o mesmo valor, clique ou toque aqui, caso contrário, eles manterão seus valores individuais."
                    },
                    "remove": {
                        "button": "Remover",
                        "confirm": {
                            "_": "Tem certeza que quer deletar %d linhas?",
                            "1": "Tem certeza que quer deletar 1 linha?"
                        },
                        "submit": "Remover",
                        "title": "Remover registro"
                    }
                },
                "decimal": ","
            } 
        });
    //

    //Move as ações das tabelas
    $("#acoes_tabela").appendTo('#filtros > .card-header').show();

    /* 
    move o bloco de botões do datatable principal para a area de filtros e, a seguir, insere os botões do filtro
    para dentro do grupo de botões 
    */
    table.buttons().container().appendTo('#acoes_tabela');
    $('#acoes_tabela > button').prependTo('.dt-buttons:eq(0)');

    //

    //Cadastrar/Editar/Remover registro
    $('#area_tabela').on('click', '.crud', function () {

        switch ($(this).data('acao')) {
            case 'C': //Cadastrar
                mostrarCrud();
                $('#id_coluna').val('');
                $('#dt_lancamento').val(new Date().toISOString().split('T')[0]);
                break;
            
            case 'U': //Atualizar
                mostrarCrud();

                //pegar informações do datatables seja de desktop ou mobile
                    var tr = $(this.closest('tr'));
                    if (tr.hasClass('child')) {
                        tr = tr.prev();
                    }
                    var data = table.row(tr).data();
                //

                //Atribui a #id_coluna o valor do obj data relativo ao name da propria #id_coluna
                $('#id_coluna').val(data[$('#id_coluna').attr('name')]);
    
                
                $.ajax({
                    type: "GET",
                    url: "../app/CRUD_basico.php",
                    data: {
                        'query': sql_datatables + " WHERE "+ $('#id_coluna').attr('name') + " = ?",
                        'params': { 1: $('#id_coluna').val() }
                    },
                    success: function (data) {
                        data = data.data[0];
                        $('#id_coluna').val(data[$('#id_coluna').attr('name')]);

                        /*============== Formulário ============*/
                        //SELECT2
                        /*
                        Exemplo:
                        var option = $("<option selected></option>").val(data['Marca']).text(data['Marca']);
                        $('#Marca').append(option);
                        */
                        /* var option = $("<option selected></option>").val(data['id_banco']).text(data['banco_descricao']);
                        $('#id_banco').append(option);

                        var option = $("<option selected></option>").val(data['tipo_pagamento']).text(data['tipo_pagamento']);
                        $('#tipo_pagamento').append(option); */
                        select2_search($('#id_banco'),data['banco_descricao']);
                        select2_search($('#tipo_pagamento'),data['tipo_pagamento']);

                        //Máscaras comuns
                        /*
                        Exemplo: 
                        $('#CEP').val(data['CEP']).trigger('input');
                        */

                        //Máscaras customizadas
                        /*
                        Exemplo: 
                        $('#TelefoneContato').val(data['TelefoneContato']).trigger('keydown');
                        */

                        //Checkbox
                        /*
                        Exemplo: 
                        (data['cartao_credito'] == 'S') ? $('#cartao_credito').prop('checked', true) : $('#cartao_credito').prop('checked', false);
                        checkbox($('#cartao_credito'));
                        */
            
                        //Radiobutton
                        /* 
                        Exemplo:
                        $('input[name="tipo"][value="'+ data['tipo'] +'"]').prop('checked',true);
                        */                        
                        $('input[name="CD"][value="'+ data['CD'] +'"]').prop('checked',true);

                        //Campos comuns
                        /*
                        Exemplo: 
                        $('#Apelido').val(data['Apelido']);
                        */
                        $('#dt_lancamento').val(data['dt_lancamento']);
                        $('#dt_vencimento').val(data['dt_vencimento']);
                        $('#descricao').val(data['descricao']);
                        $('#valor').val(data['valor']);
                        $('#valor_pago').val(data['valor_pago']);

                        /*============== Formulário ============*/
                    }
                });


                break;

            case 'D': //Deletar
                var data = table.row($(this).parents('tr')).data();
                data["tabela"] = $('#tabela').val();
                console.log(data);

                if (confirm('Deseja excluir/restaurar esse registro?')) {

                    $.ajax({
                        type: "DELETE",
                        url: "../app/CRUD_basico.php",
                        data: data,
                        success: function (response) {
                            table.ajax.reload();
                        }
                    });
                }

                break;

            default: // Ativar/Desativar
                var data = table.row($(this).parents('tr')).data();
                data["tabela"] = $('#tabela').val();

                if (confirm('Deseja excluir/restaurar esse registro?')) {

                    if (data.ativo == 'S') {
                        data.ativo = 'N';
                    } else {
                        data.ativo = 'S';
                    }
    
                    $.ajax({
                        type: "PATCH",
                        url: "../app/CRUD_basico.php",
                        data: data,
                        success: function (response) {
                            table.ajax.reload();
                        }
                    });
                }

                break;
        }
    });

    //Submit de inserção/alteração
    $('form:eq(1)').submit(function (e) {

        e.preventDefault();
        //================= Formatação das mascaras para o BD ===============
        try {
            $(".money").mask("###0.00", { reverse: true });
            $(".km").mask("###0.000", { reverse: true });
            $(".CEP").val($(".CEP").cleanVal());
            $(".TELCEL").val($(".TELCEL").cleanVal());
            $(".CPFCNPJ").val($(".CPFCNPJ").cleanVal());
        } catch (error) {
        }
        //===================================================================
        console.log($('#id_coluna').val());
        if ($('#id_coluna').val() == '') { //inserção

            $.ajax({
                type: "POST",
                url: "../app/CRUD_basico.php",
                data: $(this).serialize(),
                success: function (response) {
                    if (response.mensagem > 0) {
                        alert('Salvo');
                        $('#id_coluna').val(response.mensagem);
                        table.ajax.reload(null,false);    
                    }else{
                        alert('Falha ao salvar o registro');
                    }
                }
            });
        } else { //alteração

            $.ajax({
                type: "PUT",
                url: "../app/CRUD_basico.php",
                data: $(this).serialize(),
                success: function (response) {
                    alert('Alterado');
                    table.ajax.reload(null,false);
                }
            });
        }

        //=============== Formatação das mascaras de volta para o HTML ======
        ativar_mascaras();
        //===================================================================

    });

    //Inicialização dos campos SELECT2
        select2('#id_banco_filtro','SELECT * FROM banco WHERE descricao LIKE :termo','id_banco','descricao');
        select2_full('#id_banco','SELECT *,id_banco id, descricao text FROM banco WHERE descricao LIKE :termo',false, function(data){return '<h1>'+data.text+'</h1>';});
        select2('#tipo_pagamento','SELECT DISTINCT tipo_pagamento FROM financeiro WHERE tipo_pagamento LIKE :termo','tipo_pagamento','tipo_pagamento',true);

        
        /* $('#id_banco').on('select2:select', function (e) {
            var data = e.params.data;
            console.log(data);
        }); */
        

        /* $('#id_banco').select2({
            'ajax': {
                url: '../app/CRUD_basico.php',
                type: 'GET',
                data: function (params) {
                    //
                    params.term = params.term == undefined ? '' : params.term;

                    return {
                        query: 'SELECT *,id_banco id, descricao text FROM banco WHERE descricao LIKE :termo',
                        params: { ':termo': '%' + params.term + '%' }
                    }

                },
                processResults: function (data) {
                    return {
                        results: $.map(data.data, function (obj) {
                          return {
                              id: obj.id,
                              text: '<span class="text-success">'+obj.text+'</span>',
                              html: obj.text+'<br><sup class="text-muted">'+obj.conta+'</sup>',
                          }
                        })
                    };
                }
            },
            escapeMarkup: function(markup) {
                return markup;
            },
            templateResult: function(data) {
                //data = data.data;
                console.log(data);
                return data.html;
            },
            templateSelection: function(data) {
                //console.log(data);
                return data.text;
            }
        }); */
    //

    //filtro
    $('#filtrar').click(function (e) { 
        e.preventDefault();
        if ($('#id_banco_filtro').val() == '') {
            filtro = '0<>0';
        }else{
            filtro = 't1.id_banco='+$('#id_banco_filtro').val();
        }
        table.ajax.reload();
    });

});

function template_option(data) {
    console.log('data');
    return '<span>'+data.text+'</span>';
}

function mostrarCrud() {
    $('#area_tabela').toggle();
    $('#tela').toggle();
    $('.select2').val(null).trigger('change');
    document.getElementsByTagName('form')[1].reset();

}

function mostrarFiltro() {
    $('#filtros > .card-footer').toggle('fast');        
}