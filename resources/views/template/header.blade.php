<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="{{route('painel')}}"><b>OS</b></a>
    </div>


@if(auth()->check())
    <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">

                <li><a href="{{route('painel')}}"><i class="fa fa-dashboard"></i> Painel de controle</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i>
                        Clientes <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('cadastrar.cliente')}}">Cadastrar Cliente</a></li>
                        <li><a href="{{route('listar.clientes')}}">Visualizar clientes</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i>
                        Produtos / Serviços <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('cadastrar.item')}}">Cadastrar Produto/Serviço </a></li>
                        <li><a href="{{route('listar.produtos')}}">Visualizar produtos</a></li>
                        <li><a href="{{route('listar.servicos')}}">Visualizar serviços</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file"></i>
                        Ordens de Serviço / Orçamentos <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href={{route('nova.ordem')}}>Nova ordem/orçamento </a></li>
                        <li><a href="#">Visualizar Ordens de serviço</a></li>
                        <li><a href="{{route('listar.orcamentos')}}">Visualizar Orçamentos</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-building-o"></i>
                        Minha(s) empresa(s) <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('cadastrar.empresa')}}">Cadastrar empresa</a></li>
                        <li><a href="{{route('listar.empresa')}}">Visualizar empresa</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                        Usúarios <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('cadastrar.usuario') }}">Cadastrar usuário</a></li>
                        <li><a href="{{route('listar.usuarios')}}">Visualizar usuários</a></li>
                    </ul>
                </li>


                <li><a href="#"><i class="fa fa-wrench"></i> Bootstrap Grid</a></li>


            </ul>
            @endif


            @if(auth()->check())
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i>
                            Messages
                            <span class="badge">7</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">7 New Messages</li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                    <span class="name">John Smith:</span>
                                    <span class="message">Hey there, I wanted to ask you something...</span>
                                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                    <span class="name">John Smith:</span>
                                    <span class="message">Hey there, I wanted to ask you something...</span>
                                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                    <span class="name">John Smith:</span>
                                    <span class="message">Hey there, I wanted to ask you something...</span>
                                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">View Inbox <span class="badge">7</span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown alerts-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts
                            <span
                                    class="badge">3</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Default <span class="label label-default">Default</span></a></li>
                            <li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
                            <li><a href="#">Success <span class="label label-success">Success</span></a></li>
                            <li><a href="#">Info <span class="label label-info">Info</span></a></li>
                            <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
                            <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
                            <li class="divider"></li>
                            <li><a href="#">View All</a></li>
                        </ul>
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                            <b>{{auth()->user()->name}}</b> <b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout.os') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout.os') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endif
        </div><!-- /.navbar-collapse -->
</nav>