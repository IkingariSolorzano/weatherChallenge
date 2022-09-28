<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTTP;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class QueryController extends Controller
{
    /**
     *      *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $ciudad = $request['ciudad'];
        // dd($ciudad);
        $consulta = 'http://api.openweathermap.org/data/2.5/weather?q=' . $ciudad . '&appid=6eee4a38fa835c11fec271ba5ca255c6&lang=es&units=Metric';
        $consulta2 = 'http://api.openweathermap.org/data/2.5/forecast?q=' . $ciudad . '&appid=6eee4a38fa835c11fec271ba5ca255c6&lang=es&units=Metric';
        

        $clima = HTTP::get($consulta)->json();
        $pronostico = HTTP::get($consulta2)->json();
        // dd($lista);
        
        if ($clima['cod'] != '404' && $pronostico['cod']='404') {
            $lista= $pronostico['list'];
            $data['image'] = $clima['weather'][0]['main'];
            $data['descipcion'] = $clima['weather'][0]['description'];
            $data['ciudad'] = $clima['name'];
            $data['temperatura'] = $clima['main']['temp'];
            $data['sensacion'] = $clima['main']['feels_like'];
            $data['minima'] = $clima['main']['temp_min'];
            $data['maxima'] = $clima['main']['temp_max'];
            $data['pronostico']= array_slice($lista, 0, 3);
            // dd($data['pronostico']);
            
            return  view('home', $data);
        }else{
            $data['error'] = ['error'=>"No se encontró la ciudad"];
            return  view('home', $data);
            
        }
        // $horaC =  date("Y-m-d H:i:s", $lista[0]['dt']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function show(Query $query)
    {
        //
    }
}
