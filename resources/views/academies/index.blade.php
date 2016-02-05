@extends('layout')

@section('page_header')
    <div class="page-header">
        <div class="container">
            <h2>Explore <small> Academie's</small></h2>
        </div>
    </div>
@stop
@section('content')

    <div class="map-container">
        <div id="map" style="height: 500px;"></div>
    </div>


    <script>

        function initMap() {

            var places = [
                @foreach($academies as $academy)
                     { lat: {{ $academy->latitude }}, lng: {{ $academy->longitude }} },
                @endforeach
            ];

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: places[0]
            });

            var contentString =
                    [
                            @foreach($academies as $academy)

                        {'content' :'<div id="content">'+
                                    '<div id="siteNotice">'+
                                    '</div>'+
                                    '<h1 id="firstHeading" class="firstHeading"><a target="_NEW" href="{{ url(route('academies.show', $academy->id )) }}">{{ $academy->academy_name }}</a></h1>'+
                                    '<div id="bodyContent">'+
                                    '<p>{{ $academy->description }}</p>'+
                                    '</div>'+
                                    '</div>'
                        },
                            @endforeach
                    ];
                    var infoWindows = [];
                    @for ($i = 0; $i < count($academies); $i++)
                                    infoWindows.push(new google.maps.InfoWindow({
                        content: contentString[{{ $i }}].content,
                        maxWidth: 400
                    }));
                    @endfor

                    console.log(infoWindows);

            var markers = [];
            @for ($i = 0; $i < count($academies); $i++)
                markers.push(new google.maps.Marker({
                        position: places[{{ $i }}],
                        map: map,
                        title: '{{ $academies[$i]->academy_name }}'
                    }));
            markers[{{$i}}].addListener('click', function() {
                infoWindows[{{$i}}].open(map, markers[{{$i}}]);
                @for ($j = 0; $j < count($academies); $j++)
                    @if($j != $i)
                        infoWindows[{{$j}}].close();
                    @endif
                @endfor

            });
                    @endfor




        }

    </script>
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDMnp98sCH989CAxl1UCiSm0zpGEvM3Zgk&signed_in=true&callback=initMap"></script>

@stop
