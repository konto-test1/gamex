@extends('admin.layout.main')

@section('content')
<div class="breadcrumb tile">{{url()->current()}}</div>
<div class="pages tile">
    <div class="pages">
        <h2>Nazwa strony: {{$page->title}}</h2>
        <p>Opis strony: {{$page->opis}}</p>
        <p>Thumb: {{$page->thumb}}</p>
        <p>Slug strony: {{$page->slug}}</p>
        <p>Tytuł SEO strony: {{$page->seo_title}}</p>
        <p>Opis SEO strony: {{$page->seo_description}}</p>
        <p>ID Rodzica strony: @if($page->parent_id) {{$page->parent_id}} @else Brak @endif</p>
    </div>
    <hr>
<div class="d-flex justify-content-between">    
    <a href="/admin/pages/"><button class="btn btn-dark">back</button></a>
    <a href="/admin/pages/{{$page->id}}/edit"><button class="btn btn-success">edit</button></a>
</div>
</div>
@endsection
