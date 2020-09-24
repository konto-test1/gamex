@extends('admin.layout.main')

@section('content')
<div class="breadcrumb tile">{{url()->current()}}</div>
<div class="pages tile">
<h1>Dodajesz nowe menu:</h1> 
<form action="{{route('store_menu')}}" method="post">
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    @csrf
    <label>Nazwa menu: <input required type="text" name="menu_title" placeholder="np. Strona głowna"></label><br><br>
    <label>Opis menu: <input required type="text" name="menu_desc" placeholder="np. Menu w stopce"></label><br>
    <div class="list_pages">
        {{-- <div class="parent"><label>Strona: <input required type="text" name="page_name[1]" placeholder="Link np. /oferta lub http://allegro.pl" class="mr-2"><input required type="text" name="page_title[1]" placeholder="Nazwa strony" class="mr-2"><input type="button" data-id="1" onClick="add_subpage()" value="add sub page"></label></div> --}}
    </div>

    <div id="apps"></div>
    <input class="btn btn-primary" value="Dodaj stronę" id="add_page">
    <button class="btn btn-success">submit</button>
    {{-- napisać skrypt który dodaj nową stronę dodaje tylko /oferta oferta
    a po najechaniu na nią będzie dodaj podstronę i ona będzie automatycznie dodawać sobie że to jej rodzic! --}}
</form>
</div>
@endsection
