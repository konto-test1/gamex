<div class="burger_menu">
    <ul> 
        <div class="title">Menu</div>
        <li><a href="/" class="{{ Request::path() == '/' ? 'active' : '' }}">strona główna</a></li>
        <li class="dropdown" id="opener"><a class="dropdown-toggle {{ Request::is('oferta*') ? 'active' : '' }}" id="toggleMenuRWD" data-toggle="collapse" href="#CollapseOffer" role="button" aria-expanded="false" aria-controls="CollapseOffer" >oferta</a>
            <div class="collapse" id="CollapseOffer" >
                @foreach ($categories as $item)
                        <a class="dropdown-item" href="/oferta/{{str_slug($item->name, '-')}}">  >  {{$item->name}}</a>
                @endforeach
            </div>
        </li>
        <li><a href="/kontakt" class="{{ Request::path() == 'kontakt' ? 'active' : '' }}">Kontakt</a></li>
        <li><a href="tel:48 603 092 926"><i class="fa fa-phone" aria-hidden="true"></i>+48 603 092 926</a></li>
    </ul>
</div>