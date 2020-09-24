{{-- <div class="container">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    @if(isset($pages) && !empty($pages))
      @foreach($pages as $page)
      @if($page->parent_id == NULL)
      <li class="nav-item dropdown">
        <a href="/{{$page->slug}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="@if(App\Pages::find($page->id)->children->count() != 0) nav-link dropdown-toggle @else nav-link @endif">
          {{$page->title}}
        </a>
        @if(App\Pages::find($page->id)->children->count() != 0)
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @foreach(App\Pages::find($page->id)->children as $child)
                  <a class="dropdown-item" href="/{{$child->parent->slug}}/{{$child->slug}}">{{$child->title}}</a>
              @endforeach
          </div>
        @endif 
    </li>
      @endif
      @endforeach
      @endif
    </ul>
    <li class="nav-item"><a href="/produkty">produkty</a></li>
  </div>
  <a href="/admin"><button class="btn btn-primary">ADMIN</button></a>
</nav>
</div>
 --}}
 <header class="headroom">
  <div class="h-100 d-flex align-items-center justify-content-between">
    <div>
      <div class="logo">
        <a href="{{ url('') }}"><img src="{{ asset('img/menulogo.png') }}" alt=""></a>
      </div>
      <span class="logo-text">Maszyny do produkcji choinek i wieńcy</span>
    </div>
    <div class="menu">
      <ul>
        <li><a href="/" class="{{ Request::path() == '/' ? 'active' : '' }}">strona główna</a></li>
        <li class="dropdown show"><a class="dropdown-toggle {{ Request::is('oferta*') ? 'active' : '' }}" href="oferta.html" role="button" id="dropdownMenuLink"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">oferta</a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  {{-- <a class="dropdown-item" href="/oferta">Pełna oferta</a> --}}
              @foreach ($categories as $item)
                        <a class="dropdown-item" href="/oferta/{{str_slug($item->name, '-')}}">{{$item->name}}</a>
              @endforeach
          </div>
        </li>
        <li><a href="/kontakt" class="{{ Request::path() == 'kontakt' ? 'active' : '' }}">Kontakt</a></li>
        <!-- <li><a href="">girlandy</a></li> -->
        <li><a href=""><i class="fa fa-phone" aria-hidden="true"></i>+48 603 092 926</a></li>
      </ul>
    </div>
    <div id="toggleMenu" class="mr-3">
          <div class="nav-icon">
              <div></div>
          </div>
    </div>
  </div>
</header>