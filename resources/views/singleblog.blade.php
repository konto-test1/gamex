@extends('layouts.app')

@section('metainfo')
{{-- <title>{{$current->seotitle}}</title>
<meta name="description" content="{{$current->seodesc}}"> --}}
<title>test</title>
<meta name="description" content="test">
@endsection

@section('content')

<div class="header-small">
  <div class="content">
    <div class="content__title-green content__title">suspendisse id orci</div>
    <div class="content__title-white content__title">suspendisse cursus lacus semper</div>
  </div>
</div>


<div class="container">
  <div class="content-subpage">
    <div class="heading-active__subpage">tytuł<div class='span'></div></div>
    {{-- <div class="heading-active__subpage">{{$current->title}}<div class='span'></div></div> --}}
    <div class="row product-custom-page">
      <div class="col-12">
        <div class="desc">
            <ul>
                @foreach ($lista_produkty as $item)
                <li>{{$item->title}}</li>
                @endforeach
            </ul>
          {{-- {{dd($current)}} --}}
          In neque ante, luctus non dapibus et, aliquet sit amet lacus. Ut a turpis quam. Praesent rutrum elit mi, at
          feugiat purus facilisis at. In neque ante, luctus non dapibus et, aliquet sit amet lacus. Ut a turpis quam.
          Praesent rutrum elit mi, at feugiat purus facilisis at. In neque ante, luctus non dapibus et, aliquet sit
          amet lacus.
        </div>
      </div>
      <div class="row products">
        <div class="col-6 single">
          <div class="photo">
            <img src="http://www.sofi.pl/45-home_default/podstawa-lezka.jpg" alt="">
          </div>
          <div class="info-product">
            <div class="title">Podstawa koło 3-poziomy</div>
            <div class="price">Cena: 3,70 zł/netto</div>
          </div>
        </div>
        <div class="col-6 single">
          <div class="photo">
            <img src="http://www.sofi.pl/45-home_default/podstawa-lezka.jpg" alt="">
          </div>
          <div class="info-product">
            <div class="title">Podstawa koło 3-poziomy</div>
            <div class="price">Cena: 3,70 zł/netto</div>
          </div>
        </div>
        <div class="col-6 single">
          <div class="photo">
            <img src="http://www.sofi.pl/45-home_default/podstawa-lezka.jpg" alt="">
          </div>
          <div class="info-product">
            <div class="title">Podstawa koło 3-poziomy</div>
            <div class="price">Cena: 3,70 zł/netto</div>
          </div>
        </div>
        <div class="col-6 single">
          <div class="photo">
            <img src="http://www.sofi.pl/45-home_default/podstawa-lezka.jpg" alt="">
          </div>
          <div class="info-product">
            <div class="title">Podstawa koło 3-poziomy</div>
            <div class="price">Cena: 3,70 zł/netto</div>
          </div>
        </div>
        <div class="col-6 single">
          <div class="photo">
            <img src="http://www.sofi.pl/45-home_default/podstawa-lezka.jpg" alt="">
          </div>
          <div class="info-product">
            <div class="title">Podstawa koło 3-poziomy</div>
            <div class="price">Cena: 3,70 zł/netto</div>
          </div>
        </div>
        <div class="col-6 single">
          <div class="photo">
            <img src="http://www.sofi.pl/45-home_default/podstawa-lezka.jpg" alt="">
          </div>
          <div class="info-product">
            <div class="title">Podstawa koło 3-poziomy</div>
            <div class="price">Cena: 3,70 zł/netto</div>
          </div>
        </div>
        <div class="col-6 single">
          <div class="photo">
            <img src="http://www.sofi.pl/45-home_default/podstawa-lezka.jpg" alt="">
          </div>
          <div class="info-product">
            <div class="title">Podstawa koło 3-poziomy</div>
            <div class="price">Cena: 3,70 zł/netto</div>
          </div>
        </div>
        <div class="col-6 single">
          <div class="photo">
            <img src="http://www.sofi.pl/45-home_default/podstawa-lezka.jpg" alt="">
          </div>
          <div class="info-product">
            <div class="title">Podstawa koło 3-poziomy</div>
            <div class="price">Cena: 3,70 zł/netto</div>
          </div>
        </div>
        <div class="col-6 single">
          <div class="photo">
            <img src="http://www.sofi.pl/45-home_default/podstawa-lezka.jpg" alt="">
          </div>
          <div class="info-product">
            <div class="title">Podstawa koło 3-poziomy</div>
            <div class="price">Cena: 3,70 zł/netto</div>
          </div>
        </div>
        <div class="col-6 single">
          <div class="photo">
            <img src="http://www.sofi.pl/45-home_default/podstawa-lezka.jpg" alt="">
          </div>
          <div class="info-product">
            <div class="title">Podstawa koło 3-poziomy</div>
            <div class="price">Cena: 3,70 zł/netto</div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection
