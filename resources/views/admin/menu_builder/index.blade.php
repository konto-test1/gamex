@extends('admin.layout.main')

@section('content')
<div class="breadcrumb tile">{{url()->current()}}</div>
<div class="pages tile">
<h1>Generator Menu</h1>
<a href="{{route('register_menu')}}" class="btn btn-success">Dodaj nowe menu</a>
<div class="mt-3">
Lista zarejestrowanych menu:
    <ul>
        @foreach($menu_list as $menu)
            <li><a href="/admin/edit_menu/{{$menu->id}}">{{$menu->menu_title}}</a> <form method="post" action="{{route('delete_menu', $menu->id)}}">@csrf<button class="btn btn-danger">delete</button></form><small>({{$menu->menu_desc}})</small></li>
        @endforeach
    </ul>
</div>
</div>
@endsection
