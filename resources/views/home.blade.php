@extends('layouts.app')

@section('content')

    <div class="mn-content fixed-sidebar">
        <header class="mn-header navbar-fixed">
            <nav class="cyan darken-1">
                <div class="nav-wrapper row">
                    <section class="material-design-hamburger navigation-toggle">
                        <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                            <span class="material-design-hamburger__layer"></span>
                        </a>
                    </section>
                    <div class="header-title col s3">
                        <span class="chapter-title">Mobility Test</span>
                    </div>
                    <form class="left search col s6">
                        <div class="input-field">
                            <input id="search" type="search" placeholder="Filtrar Paradas" autocomplete="off">
                            <label for="search"><i class="material-icons search-icon">search</i></label>
                            <span class="search-text search-result-text invisivel"></span>
                        </div>
                    </form>
                    <ul class="right col s9 m3 nav-right-menu">
                        <li><a href="javascript:void(0)" data-activates="chat-sidebar" class="chat-button show-on-large" id="trigger"><i class="material-icons">more_vert</i></a></li>
                        <li class="hide-on-med-and-up"><a href="javascript:void(0)" class="search-toggle"><i class="material-icons">search</i></a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside id="chat-sidebar" class="side-nav white" style="width:27.2%;">
            <div class="side-nav-wrapper">
                <div class="col s12">
                    <ul class="tabs tab-demo" style="width: 100%;">
                        <li class="tab col s6"><a href="#sidebar-paradas" class="active">Informações da Parada</a></li>
                        <li class="tab col s6"><a href="#sidebar-filtrarParadas" class="active">Filtrar paradas por linha</a></li>
                    </ul>
                </div>

                <div id="sidebar-paradas" class="col s12 sidebar-messages right-sidebar-panel" >
                    <div class="col-s12 m4 center invisivel preloader" style="margin-top: 20px">
                        <div class="preloader-wrapper small active">
                            <div class="spinner-layer spinner-blue">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                    <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-red">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                    <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-yellow">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                    <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-green">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                    <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p style="margin-left:20px;">Nome da Parada:  <span id="stopName"></span></p>
                    <p style="margin-left:20px;">Endereço: <span id="stopAddres"></span></p>

                    <p class="right-sidebar-heading">LINHAS</p>
                    <ul class="collapsible" data-collapsible="accordion" id="stops">
                        <li>
                            <div class="chat-list collapsible-header" id="stopRoutes"  >
                                <div class="chat-item">
                                    <div class="chat-item-image">
                                        <img src={{asset('images/icons/onibus.png')}} class="" alt="Clique para exibir os horários">
                                    </div>
                                    <div class="chat-item-info">
                                        <p class="chat-name">Número da Linha</p>
                                        <span class="chat-message">Clique para exibir os horários</span>
                                    </div>
                                </div>
                            </div>
                            <div class="collapsible-body">
                                <div class="messages-container">
                                    <div class="message-wrapper them">
                                        <div class="circle-wrapper"><img src={{asset('images/icons/clock.png')}} class="" alt=""></div>
                                        <div class="text-wrapper">
                                            <ul>
                                                <li>08:32</li>
                                                <li>08:32</li>
                                                <li>08:32</li>
                                                <li>08:32</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
                <div id="sidebar-paradas" class="col s12 sidebar-messages right-sidebar-panel" >

                    <div class="row">
                    <div class="input-field inline col s6">
                        <input type="text" id="last_name" class="validate filtro-linha">
                        <label for="last_name">Número da Linha</label>
                    </div>
                    <a href="#" class="waves-effect waves-light btn col s4 center-align" id="btn-filtrolinha">FILTRAR</a>
                    </div>
                    <p class="right-sidebar-heading">PARADAS</p>
                    <ul class="filtro-paradas">

                    </ul>

                </div>
            </div>
        </aside>
        <aside id="chat-messages" class="side-nav white">
            <p class="sidebar-chat-name">Horários da Linha<a href="#" data-activates="chat-messages" class="chat-message-link"><i class="material-icons">keyboard_arrow_right</i></a></p>
            <div class="messages-container">

                        <ul class="collapsible collapsible-accordion linha-spec" data-collapsible="accordion">

                        </ul>
            </div>

        </aside>
        <aside id="slide-out" class="side-nav white fixed"  style="width:27.2%">
            <div class="side-nav-wrapper" >

                <div class="sidebar-account-settings">
                    <ul>
                        <li class="no-padding">
                            <a class="waves-effect waves-grey"><i class="material-icons">mail_outline</i>Inbox</a>
                        </li>
                        <li class="no-padding">
                            <a class="waves-effect waves-grey"><i class="material-icons">star_border</i>Starred<span class="new badge">18</span></a>
                        </li>
                        <li class="no-padding">
                            <a class="waves-effect waves-grey"><i class="material-icons">done</i>Sent Mail</a>
                        </li>
                        <li class="no-padding">
                            <a class="waves-effect waves-grey"><i class="material-icons">history</i>History<span class="new grey lighten-1 badge">3 new</span></a>
                        </li>
                        <li class="divider"></li>
                        <li class="no-padding">
                            <a class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a>
                        </li>
                    </ul>
                </div>
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion" >
                    @foreach($paradas as $p)

                        @foreach($p as $parada)
                            <li class="no-padding pesquisa-parada"><a class="waves-effect waves-blue parada" href="#?x={{$parada->py}}&y={{$parada->px}}&codParada={{$parada->cp}}"><i class="material-icons">place</i>{{$parada->np}}</a></li>
                        @endforeach

                    @endforeach
                </ul>
                <div class="footer">
                    <p class="copyright">Mobility ©</p>
                    <a href="#!">Privacy</a> &amp; <a href="#!">Terms</a>
                </div>
            </div>
        </aside>
        <main class="mn-inner" id="map-canvas">
        </main>
    </div>
    <div class="left-sidebar-hover"></div>
@endsection
