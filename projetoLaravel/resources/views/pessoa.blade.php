@extends('templates.template')
@section('content')

    <script>
        const paisesList = @json($paises);
        var urlBase = "{{url('')}}";
    </script>
    <script src="{{url('assets/js/pessoa.js')}}"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <span class="navbar-brand mb-0 h1">Pessoa</span>
      </div>
    </nav>

    <section class="json-container bg-light">
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <button type="button" class="btn btn-primary float-end mt-4" onClick="openModal('CadUser')">+ Add Pessoa</button>
                </div>
            </div>
            <div class="row mb-2 mt-5">
                <div class="col">
                    <div id="grid"></div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="CadUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" ref="CadUser">
        <div class="modal-dialog">
            <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nova Pessoa</h5>
                    <button type="button" class="btn-close" onClick="hideModal('CadUser')" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        <input placeholder="Nome da pessoa" type="text" id="nome" name="nome" class="form-control" required/>
                    </p>
                    <p>
                        <input placeholder="Data nasciemnto" type="date" id="nascimento" name="nascimento" class="form-control" required v-model="user.email"/>
                    </p>
                    <p>
                        <select class="form-select" aria-label="Default select example" id="genero" name = "genero" required>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                            <option value="">Não informado</option>
                        </select>
                    </p>
                    <p>
                        <select class="form-select" aria-label="Default select example" id="pais_id" name = "pais_id" id="pais_id" required>
                        </select>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="hideModal('CadUser')">Close</button>
                    <button type="button" id="btSubmit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    </section>

@endsection('content')