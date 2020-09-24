
@extends('admin.layout.main')

@section('content')




<div class="breadcrumb tile">{{url()->current()}}</div>
    <div class="blog tile">
    <h2>Dodajesz produkt:</h2>
    <ul class="p-0 m-0">
        <form action="/admin/blog/" method="post">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            @csrf
            <label>title <input type="text" name="title"></label><br><br>
            <label>opis <input type="text" name="opis"></label><br>
            <label>thumb<input type="text" name="thumb"></label><br>
            <label>content<input type="text" name="content"></label><br>
            {{-- <label>category<input type="text" name="category"></label><br> --}}
            <select name="category" id="">
                @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select><br>
            <label>seo_title<input type="text" name="seo_title"></label><br>
            <label>seo_description<input type="text" name="seo_description"></label><br>
            <button>submit</button>
            </form>
    </ul>
    </div>

@endsection
