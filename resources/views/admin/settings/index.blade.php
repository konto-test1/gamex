@extends('admin.layout.main')

@section('content')
    <div class="breadcrumb tile">{{url()->current()}}</div>
    <div class="pages tile">
    <h2>Informacje systemowe:</h2>
    <ul class="d-flex flex-column">
        <li>Wersja larvel: {{ App::VERSION() }}</li>
        <li>Wersja php: {{phpversion()}}</li>
        <li class="text-danger">Ostatnia aktualizacja: 5 lipiec 2019</li>
    </ul>
    </div>
@endsection
