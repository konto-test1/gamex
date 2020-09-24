@extends('admin.layout.main')

@section('content')
<div class="breadcrumb tile">{{url()->current()}}</div>
<div class="pages tile">
    <h2>Informacje o stronie:</h2>
    <b>Produkty oraz podstrony:</b><br>
    <ul>
        <li><b>Liczba kategorii:</b> {{ count($category) }}<br></li>
        <li><b>Łącznie produktów:</b> {{ count($posts) }}<br></li>
    </ul>
    ------------------------------<br>
    <b>Twoje produkty:</b><br>
    <ul>
        @foreach ($category as $item)
        <li><b>{{$item->name}}:</b> {{count($item->produkty)}}</li>
        @endforeach
    </ul>
    ------------------------------<br>
    <b>Użytkownicy:</b><br>
    <ul>
        <li><b>Zarejstrowane konta:</b> {{$count_users}}</li>
    </ul>

</div>
@endsection
