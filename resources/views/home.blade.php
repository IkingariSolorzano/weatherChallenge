@extends('layouts.app')

@section('content')

<div class="container">
    <div class="searchsection d-flex align-items-center justify-content-center">

        <input class="barra col-sm-6" id="searchbar" type="text" name="search" placeholder="Bucar el clima en...">
        <button class="btn btn-primary btn-lg   m-3" id="search">Buscar</button>
    </div>
    <div class="row d-flex justify-content-center">
        <!-- @isset($error)
        <div class="results d-flex align-content-center justify-content-center " id="results">
            <div class="alert alert-primary" role="alert">
                <strong>{{$error['error'] }} </strong>
            </div>

        </div>
        @else -->
        @isset($ciudad)
        <h2 class="container mx-6 text-align-center">El clima ahora - El clima a continuación</h2>
        <div class="card col-sm-6 mx-2" style="width: 15rem;">
            <img src="./img/{{$image}}.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $ciudad }} en este momento</h5>

                <p class="card-text">Clima: {{$descipcion}}
                    Temperatura: {{$temperatura}}
                    <br>
                    Sensación térmica:{{$sensacion}}
                    <br>
                    Mínma: {{$minima}}
                    <br>
                    Máxima: {{$maxima}}

            </div>
        </div>

        @foreach($pronostico as $prons)
        <div class="card mx-2" style="width: 15rem;">
            <img src="./img/{{ $prons['weather']['0']['main']}}.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Horario: <span class="hora">{{date("d-m H:i:s", $prons['dt'])}}</span></h5>
                <p class="card-text">
                    Temperatura {{$prons['main']['temp']}}
                    Sensacion {{$prons['main']['feels_like']}}
                    Minima {{$prons['main']['temp_min']}}
                    Máxima {{$prons['main']['temp_max']}}

                </p>

            </div>
        </div>
        @endforeach
        @endisset
        @endif

        <div class="results d-flex align-content-center justify-content-center " id="results">
        </div>
        <div class="centrado" id="loader">
            <div class="lds-ripple">
                <div></div>
                <div></div>
            </div>
            <div class="text-light">Cargando tú ubicación, espera un momento</div>
        </div>
    </div>

</div>



<script src="js/buscador.js"></script>
<script>
    var options = {
        enableHighAccuracy: true,
        timeout: 7250,
        maximumAge: 0
    };

    function success(pos) {
        var crd = pos.coords;
        latitude = crd.latitude;
        longitude = crd.longitude;
        console.log(latitude, longitude)
        resultadoMsj.innerHTML = `<div class="resultado  d-flex align-items-center justify-content-center" id="resultado"><p>Ubicación
        Latitud: ${latitude}
        Longitud: ${longitude}</p></div>`;
        resultado.appendChild(resultadoMsj);

    };

    function error(err) {
        console.warn('Ikingari dice: Ocurrió un ERROR(' + err.code + '): ' + err.message);
        resultadoMsj.innerHTML = `<div class="resultado  d-flex align-items-center justify-content-center" id="resultado"><p>No se pudo obtener tu ubicación, la búsqueda falló, verifica los permisos o introduce una búsqeuda manual</p></div>`;
        resultado.appendChild(resultadoMsj);
    };

    navigator.geolocation.getCurrentPosition(success, error, options);
</script>


@endsection