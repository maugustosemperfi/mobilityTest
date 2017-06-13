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
                    <form class="left search col s6 hide-on-small-and-down">
                        <div class="input-field">
                            <input id="search" type="search" placeholder="Filtrar Paradas" autocomplete="off">
                            <label for="search"><i class="material-icons search-icon">search</i></label>
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
                        <li class="tab col s3"><a href="#sidebar-paradas" class="active">Informações da Parada</a></li>

                    </ul>
                </div>
                <div id="sidebar-paradas" class="col s12 sidebar-messages right-sidebar-panel" >
                    <p style="margin-left:20px;">Nome da Parada:  <span id="stopName"></span></p>
                    <p style="margin-left:20px;">Endereço: <span id="stopAddres"></span></p>

                    <p class="right-sidebar-heading">LINHAS</p>
                    <div class="chat-list" id="stopRoutes" >
                        <a href="javascript:void(0)" class="chat-message collapsible-header" >

                            <div class="chat-item">
                                <div class="chat-item-image">
                                    <img src={{asset('images/icons/onibus.png')}} class="" alt="Clique para exibir os horários">
                                </div>
                                <div class="chat-item-info">
                                    <p class="chat-name">Número da Linha</p>
                                    <span class="chat-message">Clique para exibir os horários</span>

                                </div>
                            </div>

                        </a>
                    </div>
                    <div class="chat-sidebar-options">
                        <a href="#" class="left"><i class="material-icons">edit</i></a>
                        <a href="#" class="right"><i class="material-icons">settings</i></a>
                    </div>
                </div>
            </div>
        </aside>
        <aside id="chat-messages" class="side-nav white" >
            <p class="sidebar-chat-name">Linha: Número da Linha<a href="#" data-activates="chat-messages" class="chat-message-link"><i class="material-icons">clear</i></a></p>
            <div class="messages-container">
                <div class="message-wrapper them">
                    <div class="circle-wrapper"><img src={{asset('images/icons/clock.png')}} class="" alt=""></div>
                    <div class="text-wrapper">
                        <p>08:32
                            14:23
                            16:02
                            16:04</p>
                    </div>
                </div>

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
                            <li class="no-padding"><a class="waves-effect waves-blue parada" href="#?x={{$parada->py}}&y={{$parada->px}}&codParada={{$parada->cp}}"><i class="material-icons">place</i>{{$parada->np}}</a></li>
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
