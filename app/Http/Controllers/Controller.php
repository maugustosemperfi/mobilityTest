<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function teste(){

        $client = new Client(['base_uri' => 'localhost:8000']);
        $jar = new CookieJar();

        //$response = $client->request('POST', '/Login/Autenticar?token=ecc413c44dbdb7d49020f0a7ffe4e85a3995978f5f76b2accae51acf45063ab6');
        $response = $client->request('POST','http://api.olhovivo.sptrans.com.br/v2/Login/Autenticar?token=ecc413c44dbdb7d49020f0a7ffe4e85a3995978f5f76b2accae51acf45063ab6', ['cookies'=>$jar]);
        $teste1 = $client->request('GET','http://api.olhovivo.sptrans.com.br/v2/Corredor', ['cookies'=>$jar]);;
        $string = $teste1->getBody();
        //echo $string;

        //var_dump(\GuzzleHttp\json_decode($string));
        $array = \GuzzleHttp\json_decode($string);

        //var_dump(\GuzzleHttp\json_decode($string, true));
        $arrayparadas = [];
        foreach($array as $a){
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




        //return view('home')->with('response', $response);
    }
}
