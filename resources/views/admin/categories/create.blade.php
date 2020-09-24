
@extends('admin.layout.main')

@section('content')

 


<div class="breadcrumb tile">{{url()->current()}}</div>
    <div class="blog tile">
    <h2>Dodajesz kategorie:</h2>
    <ul class="p-0 m-0"> 
        <form action="/admin/categories/" method="post">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li> 
            @endforeach
            @csrf
            <label>title <input type="text" name="name"></label><br><br>
            <label>opis <input type="text" name="description"></label><br>
            <label>seo title <input type="text" name="seo_title"></label><br><br>
            <label>seo desc <input type="text" name="seo_description"></label><br>
            <label>thumb <input type="text" name="thumb"></label><br>
            <label>text_green <input type="text" name="text_green"></label><br>
            <label>text_white <input type="text" name="text_white"></label><br>
            <label>Szablon strony:
                    <select name="templates"> 
                        @foreach ($templates as $template)
                            <option value="{{ $template }}" >{{ $template }}</option>
                        @endforeach
                    </select>
                </label><br>
            <button>submit</button>
            </form>
    </ul>
    </div>

@endsection
