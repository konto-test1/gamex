@extends('layouts.app')

@section('metainfo')
<title>{{$current->seo_title}}</title>
<meta name="description" content="{{$current->seo_description}}">
@endsection

@section('content')

<div class="header-small" @if($current->thumb) style="background-image: url({{$current->thumb}})" @endif>
    <div class="content">
      <div class="content__title-green content__title">{{$current->text_green}}</div>
      <div class="content__title-white content__title">{{$current->text_white}}</div>
    </div>
  </div>


<div class="container">
    <div class="content-page">
        <div class="heading-active__page">
        <div class="title">{{$current->name}}</div>
          {{-- @foreach($blog as $test)
          <ul>
          <li>{{$test->id}} | {{$test->title}} | thumb {{$test->thumb}}</li>
          </ul>
          @endforeach --}}
          <div class="desc">{{$current->description}}</div>
        </div>
        <div class="row offer-page">

            <div class="full-offer">
              @if(isset($lista_produkty) && count($lista_produkty) )
                @foreach ($lista_produkty as $item)
                <?php $slug = $item->idcategory->slug ?>
                <div class="products-box">
                    <div class="photo"><a href="{{$slug}}/{{$item->slug}}"><img src="{{$item->filepath}}" alt=""></a></div>
                    <div class="more-info">
                        <div class="title"><a href="{{$slug}}/{{$item->slug}}">{{$item->title}}</a></div>
                      <a href="{{$slug}}/{{$item->slug}}" class="more-info--info">Zobacz</a>
                    </div>
                  </div>
                @endforeach
              @else
            </div>
                <p class="text-center w-100">chwilowy brak produktów</p>
              @endif
            </div>
            {{ $lista_produkty->links() }}
            <!-- wystyluje się już na produkcji jak będą style -->
            {{-- <div class="pagination">
              1,2,3 ... 12
            </div> --}}
        </div>
    </div>
</div>



@endsection
