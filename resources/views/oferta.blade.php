@extends('layouts.app')

@section('metainfo')
<title>BLOG</title>
<meta name="description" content="">
@endsection

@section('content')

<div class="header-small">
    <div class="content">
        <div class="content__title-green content__title">suspendisse id orci</div>
        <div class="content__title-white content__title">suspendisse cursus lacus semper</div>
    </div>
  </div>


<div class="container">
    <div class="content-page">
        <div class="heading-active__page">
        <div class="title">Oferta</div>
          {{-- @foreach($blog as $test)
          <ul>
          <li>{{$test->id}} | {{$test->title}} | thumb {{$test->thumb}}</li>
          </ul>
          @endforeach --}}
          <div class="desc">Nasza pałna oferta</div>
        </div>
        <div class="row offer-page">

            <div class="full-offer">
              @if(isset($lista_produkty) && count($lista_produkty) )
                <ul>
                  @foreach ($categories as $item)
                      <a href="/oferta/{{$item->slug}}"><li>{{$item->name}}</li></a>
                  @endforeach
                </ul>
              @else
            </div>
                <p class="text-center w-100">chwilowy brak produktów</p>
              @endif
            </div>
            <!-- wystyluje się już na produkcji jak będą style -->
            {{-- <div class="pagination">
              1,2,3 ... 12
            </div> --}}
        </div>
    </div>
</div>



@endsection
