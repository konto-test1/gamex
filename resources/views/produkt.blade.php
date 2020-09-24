
@extends('layouts.app')
 
@section('metainfo')
  <title>{{$produkt->seo_title}}</title>
  <meta name="description" content="{{$produkt->seo_description}}">
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
              <div class="heading-active__subpage">{{$produkt->title}}<div class='span'></div></div>
              <div class="row product-page">
                  <div class="col-12">
                    <div class="desc">
                        {{$produkt->opis}}
                    </div>
                    <div id="ytplayer"></div>
                    <div class="desc">
                        {{$produkt->seo_description}}
                    </div>
                  </div>
      
                  <div class="promo">
                      <div class="row">
                          <div class="promo-box col-12 col-sm-4">
                            <div class="promo-box-icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                            <div class="promo-box-title">Gwarancja zadowolenia</div>
                          </div>
                          <div class="promo-box col-12 col-sm-4">
                            <div class="promo-box-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                            <div class="promo-box-title">Ponad 25 letnie doświadczenie</div>
                          </div>
                          <div class="promo-box col-12 col-sm-4">
                            <div class="promo-box-icon"><i class="fa fa-star-o" aria-hidden="true"></i></div>
                            <div class="promo-box-title">Niezawodność w działaniu</div>
                          </div>
                        </div>
                  </div>
      
              </div>
          </div>
      </div>

      @endsection
      