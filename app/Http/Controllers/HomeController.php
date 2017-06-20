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

    public function index(){
        $paradas = $this->service->todasParadas();
        return view('home')->with('paradas', $paradas);
    }
    public function previsaoChegadaLinha($codParada){
        return response()->json($this->service->previsaoChegada($codParada));
    }

    public function todasParadas(){
        return response()->json($this->service->todasParadas());
    }



}
