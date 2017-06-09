@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" href="#collapse1">Paradas de Ônibus</a>
                </div>

                <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                    @foreach($arrayparadas as $arrayparada)
                        @foreach($arrayparada as $parada)
                            {{$parada->Endereco}}<br>
                        @endforeach

                    @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
