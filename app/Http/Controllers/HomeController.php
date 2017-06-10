<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\SPTransService;

class HomeController extends Controller
{
    public function init(SPTransService $service){

        $paradas = $service->todasParadas();

        $arrayparadas = [];
        $row = 1;
        /*if(($handle = fopen('C:\Users\augus\Documents\Alura\PHP\Laravel - facilitando o desenvolvimento PHP\mobilityTest\resources\csv\stops.txt', 'r')) != false){
            while(($data = fgetcsv($handle)) != false){
                array_push($arrayparadas, $data);
            }
            fclose($handle);
        }*/

        return view('home')->with(array('paradas'=>$paradas, 'service'=>$service));


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
    public function paradasComLinhas(SPTransService $service, $codParada){
        return response()->json($service->linhasporCodigoParada($codParada));
    }
}
