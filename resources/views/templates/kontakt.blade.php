@extends('layouts.app')

@section('metainfo')
<title>{{$current->seo_title}}</title>
<meta name="description" content="{{$current->seo_description}}">
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
          <div class="heading-active__subpage">Kontakt <div class='span'></div></div>
          <div class="row contact-page">
              <div class="address col-12 col-lg-6">
                  <div class="company">"GAMEX" Andrzej Gawliński</div>
                  42-350 Koziegłowy, Gniazdów,<br>
                  ul.Słoneczna 16
              </div>
              <div class="contact-details col-12 col-lg-6">
                      tel/fax +48 34 314-12-31<br>
                      tel. +48 603 092-926<br>
                      e-mail: gamex@gamex.com.pl<br>
              </div>
          </div>
      </div>
  </div>

  
@endsection
