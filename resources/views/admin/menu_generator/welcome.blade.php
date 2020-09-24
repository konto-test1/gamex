@extends('admin.layout.main')

@section('content')



<div class="container">
    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif

    @if (\Session::has('success'))
        <div class="alert alert-success mt-2"><ul class="p-2 m-0"><li>{!! \Session::get('success') !!}</li></ul></div>
    @endif

    <div class="row">
        <div class="col-12">
            <h1>Dodaj menu!</h1>
            <form method="post" action="{{ route('menu.store') }}">
                @csrf
                <div class="form-group d-flex"> 
                    <input class="form-control" type="text" name="name" placeholder="Nazwa menu">
                    <button class="btn btn-primary">Dodaj</button>
                </div>
            </form>

            @if(isset($added_menu) && !empty($added_menu))
            <h5><b>Istniejące menu:</b></h5>
                @if(count($added_menu) <= 0)
                    brak menu
                @else 
                <ul>
                    @foreach ($added_menu as $item)
                        <li><a href="{{route('menu.create', $item->id)}}">{{$item->name}}</a><a href="{{route('menu.create', $item->id)}}"><button class="btn btn-success mb-1 ml-5">edit</button></a><a href="{{route('menu.delete', $item->id)}}"><button class="btn btn-danger mb-1 ml-5">delete</button></a></li>
                    @endforeach
                </ul>
                @endif
            @endif

        </div>
    </div>
    </div>


@endsection
