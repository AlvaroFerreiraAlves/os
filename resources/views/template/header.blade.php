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
                        <li><a href="{{route('listar.ordens')}}">Visualizar Ordens</a></li>
                        <li><a href="{{route('listar.orcamentos')}}">Visualizar Orçamentos</a></li>


                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-building-o"></i>
                        Minha(s) empresa(s) <b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        @foreach(auth()->user()->tipoUsuario as $t)
                            @if($t->pivot->id_tipo_usuario == 1 || $t->pivot->id_tipo_usuario == 2)
                                <li><a href="{{route('cadastrar.empresa')}}">Cadastrar empresa</a></li>
                                <li><a href="{{route('listar.empresa')}}">Visualizar empresa</a></li>
                                @break
                            @else
                                <li><a href="{{route('listar.empresa')}}">Visualizar empresa</a></li>
                            @endif
                        @endforeach


                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                        Usúarios <b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        @foreach(auth()->user()->tipoUsuario as $t)
                            @if($t->pivot->id_tipo_usuario == 1 || $t->pivot->id_tipo_usuario == 2)
                                <li><a href="{{ route('cadastrar.usuario') }}">Cadastrar usuário</a></li>
                                <li><a href="{{route('listar.usuarios')}}">Visualizar usuários</a></li>
                                @break
                            @else
                                <li><a href="{{route('listar.usuarios')}}">Visualizar usuários</a></li>
                            @endif
                        @endforeach


                    </ul>
                </li>



            </ul>
            @endif


            @if(auth()->check())
                <ul class="nav navbar-nav navbar-right navbar-user">

                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                            <b>{{auth()->user()->name}}</b> <b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout.os') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                            class="fa fa-power-off"></i>
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