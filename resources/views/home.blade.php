@extends('layouts.app')

@section('content')




<div class="searchsection d-flex align-items-center justify-content-center">

    <input class="barra col-sm-6" id="searchbar" type="text" name="search" :model="search" placeholder="Bucar el clima en...">
    <button class="btn btn-primary btn-lg   m-3" id="search">Buscar</button>
</div>
<!-- @isset($error)
    <div class="results d-flex align-content-center justify-content-center " id="results">
        <div class="alert alert-primary" role="alert">
            <strong>{{$error['error'] }} </strong>
        </div>
        
    </div>
    @else -->
<div class="row d-flex justify-content-center">
    @isset($ciudad)
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-sm-3 text-center justify-items-center">
                <div class="h4 bg-white fw-bold  ">El clima Hoy</div>
                <div class="card col-sm-4 mx-4 p-2" style="width: 12rem;">
                    <img src="./img/{{$image}}.png" class="card-img-top" alt="{{ $descipcion }}">
                    <div class="card-body">
                        <h5 class="card-title">
                            <div class="fw-bold">{{ $ciudad }} </div>en este momento
                        </h5>

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
            </div>
            <div class="col-sm-7 text-center">
                <div class="h4 bg-white fw-bold ">Próximos pronósticos</div>
                <div class="d-flex">
                    @foreach($pronostico as $prons)
                    <div class="card mx-2" style="width: 12rem;">
                        <img src="./img/{{ $prons['weather']['0']['main']}}.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Horario: <span class="hora">{{date("d-m H:i:s", $prons['dt'])}}</span></h5>
                            <p class="card-text">
                                Temperatura {{$prons['main']['temp']}}
                                <br>
                                Sensacion {{$prons['main']['feels_like']}}
                                <br>
                                Minima {{$prons['main']['temp_min']}}
                                <br>
                                Máxima {{$prons['main']['temp_max']}}

                            </p>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <div class="results d-flex align-content-center justify-content-center " id="results">
            <div id="resultado"></div>
        </div>
        <div class="centrado" id="loader">
            <div class="lds-ripple">
                <div></div>
                <div></div>
            </div>
            <div class="text-light">Cargando tú ubicación, espera un momento</div>
        </div>
        @endisset
        @endif


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