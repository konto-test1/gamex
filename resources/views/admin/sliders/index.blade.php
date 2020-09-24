@extends('admin.layout.main')

@section('content')
    <div class="breadcrumb tile">{{url()->current()}}</div>
    <div class="blog tile">
    <h2>Lista kategorii:</h2>
    <ul class="p-0 m-0">
    @foreach($sliders as $item) 
        <li class="d-flex justify-content-between mb-1">
                <div class="page-name">{{$item->title}}</div>
                <div class="page-action d-flex">
                <a href="/admin/sliders/{{$item->id}}/edit"><button class="btn btn-secondary mr-1">edit</button></a> 
                <form action="/admin/sliders/{{$item->id}}" method="post">
                <input class="btn btn-danger" type="submit" value="Delete" />
                {!! method_field('delete') !!} 
                {!! csrf_field() !!}
              </form>
                </div>
        </li>
    @endforeach
    </ul>
    {{-- [template foo="test"] --}}
    {{-- {{$blog->links()}} --}}
    </div>
    <a href="/admin/sliders/create"><button class="btn btn-success">Add new</button></a>
@endsection
