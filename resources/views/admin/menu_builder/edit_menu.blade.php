@extends('admin.layout.main')

@section('content')
<div class="breadcrumb tile">{{url()->current()}}</div>
<div class="pages tile">
<h1>Edytujesz menu {{$menu->menu_title}}:</h1>

<form action="{{route('update_menu', $menu->id)}}" method="post">
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    @csrf
    <label>Nazwa menu: <input type="text" name="menu_title" placeholder="np. Strona głowna" value="{{$menu->menu_title}}"></label><br><br>
    <label>Opis menu: <input type="text" name="menu_desc" placeholder="np. Menu w stopce" value="{{$menu->menu_desc}}"></label><br>
    <div class="list_pages">
    tutaj relację i wyświetlać wszystkie strony w tym menu<br>

        @foreach($items as $key => $item)
    <div class="parent" style="border: 1px solid gray; margin-bottom: 20px">
            <span class="text-primary">Strona:</span>
            <input type="text" name="page_name[{{$key}}]" placeholder="Link np. /oferta lub http://allegro.pl" class="mr-2" value="{{$item->page_name}}">
            <input type="text" name="page_title[{{$key}}]" placeholder="Nazwa strony" class="mr-2" value="{{$item->page_title}}">
            <input type="text" name="parents_items[{{$key}}]" placeholder="id rodzica" class="parentidCurrent" value="{{$item->parents_items}}" hidden>
            <input type="text" name="page_parent[{{$key}}]" placeholder="kieruje na rodzica"  value="{{$item->page_parent}}" hidden>
            <input type="text" name="page_number[{{$key}}]" class="number" placeholder="numer strony"  value="{{$item->page_number}}" hidden>
            <input type="text" value="{{$key}}" placeholder="uchyw dla JS żebym wiedział ile mam inputów" class="key-value" hidden>
            <input type="button" class="test" data-id="{{$item->parents_items}}" value="add sub page"> 
            @foreach ($children as $key1=>$itemek)
                @if($itemek->page_parent == $item->parents_items)
                    <div class="child" data-numer="{{$key1}}">
                        <span class="text-primary">Podstrona:</span>
                        <input type="text" name="page_name[{{$key1}}]" placeholder="Link np. /oferta lub http://allegro.pl" class="mr-2" value="{{$itemek->page_name}}">
                        <input type="text" name="page_title[{{$key1}}]" placeholder="Nazwa strony" class="mr-2" value="{{$itemek->page_title}}">
                        <input type="text" name="parents_items[{{$key1}}]" placeholder="id rodzica"  value="{{$itemek->parents_items}}" hidden>
                        <input type="text" name="page_parent[{{$key1}}]" placeholder="kieruje na rodzica"  value="{{$itemek->page_parent}}" hidden>
                        <input type="text" name="page_number[{{$key1}}]" class="number" placeholder="numer strony"  value="{{$itemek->page_number}}" hidden>
                        <input type="text" value="{{$key1}}" placeholder="uchwyt dla skryptu" class="key-value" hidden>
                    </div>
                @endif
            @endforeach
        </div>
        @endforeach

    </div>
    <input class="btn btn-primary" value="Dodaj kolejną stronę" id="add_page">
    <button class="btn btn-success">submit</button>
</form>
</div>

@endsection
