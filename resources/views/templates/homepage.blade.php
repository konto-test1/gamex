@extends('layouts.app')

@section('metainfo')
<title>{{$current->seo_title}}</title>
<meta name="description" content="{{$current->seo_description}}">
@endsection


@section('content')
{{-- {{dd($pages)}} --}}

  <!-- Slider main container -->
  <div class="swiper-container swiper-home">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide"><img src="img/back.png" alt="">
            <div class="content">
              <div class="content__title-green content__title">GAMEX template</div>
              <div class="content__title-white content__title">Produkcja maszyn do choinek sztucznych i wieńców</div>
              <div class="content__desc">Zajmujemy się produkcją maszyn od 1994r. Polecamy maszyny nowe i używane.</div>
              <div class="button button--green">sprawdź nasze produkty</div>
            </div> 
          </div>
        </div>
        <div class="scroll"><img src="img/scroll.png" alt=""></div>
        <!-- If we need pagination -->
        <!-- <div class="swiper-pagination"></div> -->
    
        <!-- If we need navigation buttons -->
        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
      </div>
    {{-- <button id="test">TEST</button> --}}
      <div class="about_us" id="froala-editor">
        <div class="container space">
          <div class="about_us--title heading">Co dokładnie robimy? <div class='span'></div></div>
          <div class="about_us--desc description">Zajmujemy się produkcją maszyn i akcesoriów (folie, druty, żyłki, uchwyty, podstawy) do choinek i wieńców.</div>
          <div class="row">
            <div class="promo-box col-12 col-sm-4">
              <div class="promo-box-icon"><i class="fa fa-list-alt" aria-hidden="true"></i></div>
              <div class="promo-box-title">Posiadamy ponad 25 lat doświadczenia w branży</div>
            </div>
            <div class="promo-box col-12 col-sm-4">
              <div class="promo-box-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
              <div class="promo-box-title">Wyróżnia nas specjalistyczna wiedza</div>
            </div>
            <div class="promo-box col-12 col-sm-4">
              <div class="promo-box-icon"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></div>
              <div class="promo-box-title">Zapewniamy produkty najwyższej jakości</div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="info">
        <div class="container space">
          <div class="row">
            <div class="info--box col-12 col-md-4">
              <div class="info--box-title">MATERIAŁY DO PRODUKCJI SZTUCZNYCH CHOINEK I WIEŃCÓW</div>
              <div class="info--box-desc">Sed egestas purus id risus aliquam efficitur. Cras nisi orci, placerat sed nisi
                nec,
                ullamcorper volutpat leo. Fusce vitae nisi quis dolor dignissim commodo. Morbi faucibus arcu et felis
                blandit,
                vel congue enim varius. Sed egestas purus id risus aliquam efficitur. Cras nisi orci, placerat sed nisi nec,
                ullamcorper volutpat leo. Fusce vitae nisi quis dolor dignissim commodo. Morbi faucibus arcu et felis
                blandit,
                vel congue enim varius. </div>
            </div>
            <div class="info--box col-12 col-md-4">
              <div class="info--box-title">MATERIAŁY DO PRODUKCJI SZTUCZNYCH CHOINEK I WIEŃCÓW</div>
              <div class="info--box-desc">Sed egestas purus id risus aliquam efficitur. Cras nisi orci, placerat sed nisi
                nec,
                ullamcorper volutpat leo. Fusce vitae nisi quis dolor dignissim commodo. Morbi faucibus arcu et felis
                blandit,
                vel congue enim varius. Sed egestas purus id risus aliquam efficitur. Cras nisi orci, placerat sed nisi nec,
                ullamcorper volutpat leo. Fusce vitae nisi quis dolor dignissim commodo. Morbi faucibus arcu et felis
                blandit,
                vel congue enim varius. </div>
            </div>
            <div class="info--box col-12 col-md-4">
              <div class="info--box-title">MATERIAŁY DO PRODUKCJI SZTUCZNYCH CHOINEK I WIEŃCÓW</div>
              <div class="info--box-desc">Sed egestas purus id risus aliquam efficitur. Cras nisi orci, placerat sed nisi
                nec,
                ullamcorper volutpat leo. Fusce vitae nisi quis dolor dignissim commodo. Morbi faucibus arcu et felis
                blandit,
                vel congue enim varius. Sed egestas purus id risus aliquam efficitur. Cras nisi orci, placerat sed nisi nec,
                ullamcorper volutpat leo. Fusce vitae nisi quis dolor dignissim commodo. Morbi faucibus arcu et felis
                blandit,
                vel congue enim varius. </div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="products">
        <div class="container space">
          <div class="products--title heading">Nasze produkty <div class='span'></div></div>
          <div class="products--desc description">In neque ante, luctus non dapibus et, aliquet sit amet lacus. Ut a turpis
            quam.
            Praesent rutrum elit mi, at feugiat purus facilisis at.</div>
          <div class="product--slider">
            <div class="swiper-container swiper-gallery">
              <div class="swiper-wrapper">
                @foreach ($products as $product)
                  <div class="swiper-slide products-box">
                    <div class="photo"><a href="oferta/{{App\Category::findOrFail(10)->slug}}/{{$product->slug}}"><img src="{{$product->filepath}}"
                          alt=""></a></div>
                    <div class="more-info">
                    <div class="title"><a href="oferta/{{App\Category::findOrFail(10)->slug}}/{{$product->slug}}">{{$product->title}}</a></div>
                      <a href="oferta/{{App\Category::findOrFail(10)->slug}}/{{$product->slug}}" class="more-info--info">Zobacz szczegóły</a>
                    </div>
                  </div>
                @endforeach
              </div>    
            </div>
            <div class="swiper-prev"><img src="img/arrow.png" alt=""></div>
            <div class="swiper-next"><img src="img/arrow.png" alt=""></div>
          </div>
        </div>
      </div>
    
    
    
      <div class="contact">
        <div class="container space">
          <div class="contact-title">Masz pytania?</div>
          <div class="contact-desc">Zadzwoń lub napisz</div>
          <div class="contact-center">
            <a href="tel:48603092926">
              <span class="icon"><img src="img/phone.png" alt=""></span>+48 603 092 926
            </a>
            <a href="mailto:biuro@gamex.com.pl">
                <span class="icon"><img src="img/mail.png" alt=""></span> {{{hide_mail('biuro@gamex.com.pl')}}} 
            </a>
          </div>
        </div>
      </div>
    
      














@endsection
