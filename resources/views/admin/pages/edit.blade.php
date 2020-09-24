@extends('admin.layout.main')

@section('content')
<div class="breadcrumb tile">{{url()->current()}}</div>
<div class="pages tile">
<form action="/admin/pages/{{$page->id}}" method="post">
<h2>Edytujesz stronę:</h2>
    @csrf
    @method('put')
    <label>title <input type="text" name="title" value="{{$page->title}}"></label><br>
    <label>opis <input type="text" name="opis" value="{{$page->opis}}"></label><br>
    <label>seo title<input type="text" name="seo_title" value="{{$page->seo_title}}"></label><br>
    <label>seo desc<input type="text" name="seo_description" value="{{$page->seo_description}}"></label><br>
<label>        <select name="parent_id" id="parent_id">
        <option value="">Brak rodzica</option>
            @foreach($allpages->all() as $allpage)
            @if(!$allpage->parent_id)
                <option value="{{$allpage->id}}" @if($page->parent_id == 13) selected @endif>{{$allpage->title}}</option>
                @endif
            @endforeach
        </select>
</label><br>
    <label>thumb<input type="text" name="thumb" value="{{$page->thumb}}"></label><br>
    <label>Szablon strony:
        <select name="templates">
            @foreach ($templates as $template)
                <option value="{{ $template }}" @if($template == $page->templates) selected @endif >{{ $template }}</option>
            @endforeach
        </select>
    </label>
    

<hr>
<div class="d-flex justify-content-between">    
    <a href="/admin/pages/"><input type="button" class="btn btn-dark" value="back"></a>
    <button class="btn btn-success">submit</button>
</div>
</div>
</form>
@endsection
