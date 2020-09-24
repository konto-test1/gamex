@extends('admin.layout.main')

@section('content')
    <div class="breadcrumb tile">{{url()->current()}}</div>
    <div class="blog tile">
    <h2>Dodane produkty:</h2>
    <ul class="p-0 m-0">
    @foreach($blog as $page)
    <?php $slug1 = $page->idcategory->slug ?>
        <li class="d-flex justify-content-between mb-1">
        <div class="page-name">{{$page->title}}</div>
                <div class="page-action d-flex">
                <a href="/oferta/{{$slug1}}/{{$page->slug}}"><button class="btn btn-primary mr-1">show</button></a>
                <a href="/admin/blog/{{$page->id}}/edit"><button class="btn btn-secondary mr-1">edit</button></a> 
                <form action="/admin/blog/{{$page->id}}" method="post">
                <input class="btn btn-danger" type="submit" value="Delete" />
                {!! method_field('delete') !!}
                {!! csrf_field() !!}
              </form>
                </div>
        </li>
    @endforeach
    </ul>
    {{$blog->links()}}
    </div>
    <a href="/admin/blog/create"><button class="btn btn-success">Add new</button></a>
@endsection
