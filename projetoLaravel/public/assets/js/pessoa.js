function hideModal(idModal) {
    $(`#${idModal}`).modal('hide')
}

function openModal(idModal) {
    $(`#${idModal}`).modal('show')
}

const generoList = [
    {id:"M", nome: "Masculino"},
    {id:"F", nome: "Feminino"},
    {id:"", nome: "Não informado"}
];

function paisesEditor(container, options) {
    $('<input required name="pais_id">')
        .appendTo(container)
        .kendoDropDownList({
            autoBind: true,
            dataTextField: "nome",
            dataValueField: "id",
            dataSource: {
                data: paisesList
            }
        });
}

function generoEditor(container, options) {
    $('<input name="genero">')
        .appendTo(container)
        .kendoDropDownList({
            autoBind: true,
            dataTextField: "nome",
            dataValueField: "id",
            dataSource: {
                data: generoList
            }
        });
}

$(function(){
    let optionPais = '<option value="">Selecione a nascionalidade</option>';
    paisesList.map((pais) => {
        optionPais += `<option value="${pais.id}">${pais.nome}</option>`;
    });
    $('#pais_id').html(optionPais);

    let dataSource = new kendo.data.DataSource({
        transport: {
            read: {
                url: urlBase + "/api/pessoa",
                type: 'GET',
                dataType: "json"
            },
            create: {
                url: urlBase + '/api/pessoa',
                type: 'POST',
                dataType: 'json'
            },
            update: {
                url: urlBase + "/api/pessoa",
                type: 'PUT',
                dataType: 'json'
            },
            destroy: {
                url: urlBase + "/api/pessoa",
                type: 'DELETE',
                dataType: 'json'
            },
            parameterMap: function (options, operation) {
                if (operation !== "read" && options.models) {
                    return { models: kendo.stringify(options.models) };
                }
            }
        },
        batch: true,
        pageSize: 20,
        autoSync: true,
        schema: {
            model: {
                id: "id",
                fields: {
                    id: { editable: false, nullable: true },
                    nome: { type: "string", editable: true },
                    nascimento: { type: "date", editable: true },
                    genero_nome: {
                        editable: true,
                        defaultValue: {
                            id: 'M',
                            nome: 'Masculino'
                        }
                    },
                    pais_nome: {
                        defaultValue: {
                            id: '1',
                            nome: "Brasil"
                        }
                    }
                }
            }
        }
    });

    $("#grid").kendoGrid({
        dataSource: dataSource,
        height: 650,
        pageable: true,
        sortable: true,
        reorderable: true,
        filterable: true,
        columns: [
            {
                field: "nome",
                tilte: "Nome",
                width: 160
            }, {
                field: "nascimento",
                title: "Nascimento",
                format: "{0:dd/MM/yyyy}",
                width: 200
            }, {
                field: "genero_nome",
                title: "Genero",
                editor: generoEditor,
                groupHeaderTemplate: "genero: #=data.value#",
            }, {
                field: "pais_nome",
                editor: paisesEditor,
                groupHeaderTemplate: "pais_id: #=data.value#",
            },
            { command: ["edit", "destroy"], title: "&nbsp;", width: "200px" }
        ],
        editable: "inline"
    });

    $('#btSubmit').click(function(){
        $.ajax({
            type: "POST",          
            url: urlBase + '/api/pessoa',
            data: {
                nome: $('#nome').val(),
                nascimento: $('#nascimento').val(),
                genero: $('#genero').val(),
                pais_id: $('#pais_id').val()
            },
            success: function(exibir) {
                alert('Pessoa inserido com sucesso!');
                window.location.href = urlBase;
            },
            error: function(error){
                let msgErrors = '';
                Object.entries(error.responseJSON.errors).forEach(erro => {
                    msgErrors += `<p>- ${erro[1]}</p>`;
                });
                $('#errors').html(msgErrors).fadeIn(1000);
            }
            
        });
    });

});