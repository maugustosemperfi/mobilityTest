<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\SPTransService;

class HomeController extends Controller
{
    protected $service;

    public function __construct(SPTransService $service){
        $this->service = $service;
    }

    public function init(){
        $paradas = $this->service->todasParadas();
        return view('home')->with('paradas', $paradas);
    }
    public function paradasComLinhas($codParada){
        return response()->json($this->service->linhasporCodigoParada($codParada));
    }

    public function previsaoChegadaLinha($codParada, $codLinha){
        return response()->json($this->service->previsaoChegada($codParada, $codLinha));
    }

    public function todasParadas(){
        return response()->json($this->service->todasParadas());
    }

    public function testeApi(){
        return $this->service->testeApi();
    }
}
