@extends('admin.layout.main')

@section('content')
    <div class="breadcrumb tile">{{url()->current()}}</div>
    <div class="blog tile">
    <h2>Formularz kontaktowy:</h2>
    <small>(jeśli masz problem ze stroną, lub chcesz ją po prostu rozwinąć napisz poniżej.)</small>
    <ul class="p-0 m-0">
    <form action="/admin/send/email" method="post">

    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif

    @if (\Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
    @endif

    @csrf
        <label>Temat: 
            <select name="title">
                <option>Poprawki na stronie</option>
                <option>Problem ze stroną</option>
                <option>Nowe zlecenie</option>
                <option>Inne pytanie</option>
            </select>
        </label>
        <label class="w-100">Wiadomosc: <br><textarea name="message" cols="100" rows="5" class="w-100"></textarea></label><br>
        <div class="d-flex justify-content-between">    
            <button class="btn btn-primary">send</button>
            <button class="btn btn-danger" type="reset">clear</button>
        </div>
    </form>
    </ul>
    </div>
@endsection
