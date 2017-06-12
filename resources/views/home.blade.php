@extends('layouts.app')

@section('content')
<div class="container">

        <div class="col-md-4 col-xs-6 left">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" href="#collapse1">Paradas de Ônibus</a>
                </div>

                <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                    @foreach($paradas as $p)
                            @foreach($p as $c)
                                <a href="#?x={{$c->Latitude}}&y={{$c->Longitude}}&codParada={{$c->CodigoParada}}" class="teste"><p>{{$c->Endereco}}</p></a>
                            @endforeach
                    @endforeach
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-6 ">
            <div class="panel panel-default">

                <div class="panel-body" style=" height: 400px;">
                    <div id="map" style="position: relative; overflow: hidden;"></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Informações</h4>
                </div>
                <div class="panel-body">
                    <p>Nome da Parada: <span id="stopName"></span> </p>
                    <p>Endereço da Parada: <span id="stopAddr"></span></p>
                    <p>Linhas da parada: </p><span id="stopRoutes"></span>
                            <ul class="list-unstyled" id="previsaoChegada">
                            </ul>
                </div>
            </div>
        </div>


</div>
@endsection
