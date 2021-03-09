@extends('templates.template')
@section('content')

    <script>
        const paisesList = @json($paises);
        var urlBase = "{{url('')}}";
    </script>
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet"/>
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

        @component('components.modalUser')
        @endcomponent
    </section>

@endsection('content')