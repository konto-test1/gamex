
@extends('admin.layout.main')

@section('content')




<div class="breadcrumb tile">{{url()->current()}}</div>
    <div class="blog tile">
    <h2>Dodajesz kategorie:</h2>
    <ul class="p-0 m-0"> 
        <form action="/admin/sliders/" method="post">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            @csrf
            <label>title <input type="text" name="title"></label><br><br>
            <label>opis <input type="text" name="description"></label><br>
            <button>submit</button>
            </form>
    </ul>
    </div>

@endsection
