@extends('admin.layout.main')

@section('content')
    <div class="breadcrumb tile">{{url()->current()}}</div>
    <div class="pages tile">
    <h2>Twoje konto:</h2>
    <div class="content">
    <ul class="d-flex flex-column">
        <li>Nick: {{ Auth::user()->name }}</li>
        <li>Email: {{ Auth::user()->email }}</li>
        <li>Jesteś z nami od: {{ Auth::user()->created_at }}</li>
        <li><a href="/admin/changepass">Zmień hasło</a></li>
    </ul>
    </div>
@endsection
