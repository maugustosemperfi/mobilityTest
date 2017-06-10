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
        /*foreach($array as $a){
            //echo $a->CodCorredor.'<br>';
            $parada = $client->request('GET', 'http://api.olhovivo.sptrans.com.br/v2/Parada/BuscarParadasPorCorredor?codigoCorredor='.$a->CodCorredor, ['cookies'=>$jar]);

            $arrayparada = \GuzzleHttp\json_decode($parada->getBody());

            //foreach($arrayparada as $p){
            //    echo 'Endereço: '.$p->Endereco.'     ';
            //    echo 'Latitude: '.$p->Latitude.'     ';
            //    echo 'Longitude: '.$p->Longitude.'<br>';
            //}
            //echo $a->Nome.'<br><br><br>';

            array_push($arrayparadas, $arrayparada);
        }
        return view('home')->with('arrayparadas', $arrayparadas);
        */



        //return view('home')->with('response', $response);
    }
    public function paradasComLinhas($codParada){
        return response()->json($this->service->linhasporCodigoParada($codParada));
    }

    public function previsaoChegadaLinha($codParada, $codLinha){
        return response()->json($this->service->previsaoChegada($codParada, $codLinha));
    }
}
