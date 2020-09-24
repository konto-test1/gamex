<div class="maps">
    <div class="container">
    <div class="map--form">
            <div class="map--form-title">Formularz kontaktowy</div>
            <form action="{{route('send_mail')}}" name="contact_form" id="contact_form" method="POST" class="map--form-content">
                @csrf
                @honeypot
                <input type="text" hidden name="recapche" id="recapche">
                <input type="text" placeholder="Imię" name="name">
                <input type="text" placeholder="Nazwisko" name="surname">
                <input type="text" placeholder="Firma" name="company">
                <input type="text" placeholder="Telefon" name="phone">
                <textarea id="" cols="30" rows="10" placeholder="Trość wiadomości" name="message"></textarea>
                <button type="submit" value="wyślij" class="button button--dark">Wyślij</button>
            </form>
        </div>
    </div>
    {{-- <iframe src="https://snazzymaps.com/embed/175641" width="100%" height="420px" style="border:none;"></iframe> --}}
    <div id='map' style='width: 100%; height: 420px;'></div>
</div>
    <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZ3JhZHppdSIsImEiOiJjano4eDIxemExOW5tM2NvNjczMWtzMjJvIn0.WA3RiBYXvKgszTVbcFIfTA';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/light-v10',
        center: [19.110718163640177, 50.59700160411655],
        zoom: 14
    });

    map.on('load', function () {
        map.addLayer({
            "id": "points",
            "type": "symbol",
            "source": {
                "type": "geojson",
                "data": {
                    "type": "FeatureCollection",
                    "features": [{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [19.117718163640177, 50.59800160411655]
                        },
                        "properties": {
                            "title": "Gamex",
                        }
                    }]
                }
            },
            "layout": {
                "text-field": "{title}",
                "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
                "text-offset": [0, 0.6],
                "text-anchor": "top",
            }
        });
    });
    </script>