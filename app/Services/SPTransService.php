<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;


class SPTransService{

    protected $client;
    protected $auth;

    public function __construct(){
        $this->client = new Client(['base_uri' => 'http://api.olhovivo.sptrans.com.br/v2.1/']);
        $this->auth = $this->authApi();
    }
    private function authApi(){
        $jar = new CookieJar();
        $this->client->post('Login/Autenticar?token=ecc413c44dbdb7d49020f0a7ffe4e85a3995978f5f76b2accae51acf45063ab6', ['cookies'=>$jar]);
        return $jar;
    }

    public function getCorredores(){
        return \GuzzleHttp\json_decode($this->client->get('Corredor', ['cookies'=>$this->auth])
            ->getBody());
    }

    public function paradasPorCorredor($codigoCorredor){
        return \GuzzleHttp\json_decode($this->client->get('Parada/BuscarParadasPorCorredor?codigoCorredor='.$codigoCorredor,
            ['cookies'=>$this->auth])->getBody());
    }

    public function todasParadas(){
        $paradas = [];
        foreach($this->getCorredores() as $c){
            array_push($paradas, $this->paradasPorCorredor($c->cc));
        }
        return $paradas;
    }

    public function previsaoChegada($codigoParada){
        return \GuzzleHttp\json_decode($this->client->get('Previsao/Parada?codigoParada='.$codigoParada,
            ['cookies'=>$this->auth])->getBody())->p;
    }

    public function previsaoChegadaLinhaParadas($codigoLinha){
        return \GuzzleHttp\json_decode($this->client->get('Previsao/Linha?codigoLinha='.$codigoLinha,
            ['cookies'=>$this->auth])->getBody());
    }

    public function paradasPorLinha($codigoLinha){
        return \GuzzleHttp\json_decode($this->client->get('Parada/BuscarParadasPorLinha?codigoLinha='.$codigoLinha,
            ['cookies'=>$this->auth])->getBody());
    }


}