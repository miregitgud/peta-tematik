@extends('main')
@section('content')
    <div class="container">
        <div class="card mt-4" style="border-radius: 10px; border: 1px solid #000000; box-shadow: 2px 2px 2px 2px #888888;">
            <h1 class="text-center my-3">Populasi DKI Jakarta</h1>
            <div id="map" style="height: 500px;"></div>
        </div>
    </div>


    <script>
        // Inisialisasi peta
        var map = L.map("map").setView([-6.2179898, 106.804595], 11);
        L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="https://jakarta.bps.go.id/id/statistics-table/2/MTI3MCMy/jumlah-penduduk-menurut-kabupaten-kota-di-provinsi-dki-jakarta-html" target="_blank">Data Populasi BPS DKI Jakarta</a>',
        }).addTo(map);

        console.log(@json($regencies));

        const regencies = @json($regencies);
        const regencyData = regencies.map(regency => {
            try {
                const coordinates = JSON.parse(regency.polygon); // Parsing polygon JSON
                if (!coordinates || !Array.isArray(coordinates)) {
                    throw new Error(`Invalid coordinates for regency ID: ${regency.id}`);
                }
                return {
                    type: 'Feature',
                    properties: {
                        id: regency.id,
                        province_id: regency.province_id,
                        name: regency.name,
                        populasi: regency.populasi,
                    },
                    geometry: {
                        type: regency.type_polygon,
                        coordinates: coordinates,
                    }
                };
            } catch (error) {
                console.error('Error parsing polygon:', regency, error);
                return null; // Abaikan data yang bermasalah
            }
        });

        const geoJson = {
            type: 'FeatureCollection',
            features: regencyData,
        }

        function getColor(d) {
            return d > 3000000 ? '#800026' :
                d > 2500000 ? '#BD0026' :
                d > 2000000 ? '#E31A1C' :
                d > 1500000 ? '#FC4E2A' :
                d > 1000000 ? '#FD8D3C' :
                d > 100000 ? '#FEB24C' :
                d > 10000 ? '#FED976' :
                '#FFEDA0';
        }

        function style(feature) {
            return {
                fillColor: getColor(feature.properties.populasi),
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7
            };
        }

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });

            layer.bringToFront();
            info.update(layer.feature.properties);
        }

        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            info.update();
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }

        function formatNumber(num) {
            return num.toLocaleString('id-ID'); // Format sesuai dengan Indonesia (pemisah titik dan koma)
        }

        var info = L.control();

        info.onAdd = function(map) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;
        };

        info.update = function(props) {
            this._div.innerHTML = '<h4>Populasi</h4>' + (props ?
                '<b>' + props.name + '</b><br />' + formatNumber(props.populasi) + ' jiwa' :
                'Arahkan kursor ke wilayah');
        };

        info.addTo(map);

        var legend = L.control({
            position: 'bottomright'
        });

        legend.onAdd = function(map) {

            var div = L.DomUtil.create('div', 'info legend'),
                grades = [0, 10000, 100000, 1000000, 1500000, 2000000, 2500000, 3000000],
                labels = [];

            div.innerHTML += '<h4>Populasi</h4>'
            // loop through our density intervals and generate a label with a colored square for each interval
            for (var i = 0; i < grades.length; i++) {
                div.innerHTML +=
                    '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                    formatNumber(grades[i]) + (grades[i + 1] ? '&ndash;' + formatNumber(grades[i + 1]) + '<br>' : '+');
            }

            return div;
        };

        legend.addTo(map);

        var geojson = L.geoJson(geoJson, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);
    </script>
@endsection
