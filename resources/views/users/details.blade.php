@extends('template.main')

@section('content')




    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p><a href="{{route("editar.usuario", $user->id)}}" class="btn btn-default"><i class="fa fa-pencil"
                                                                                                   aria-hidden="true"></i>
                    Editar</a></p>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Dados do Usuário
                        <button type="button" class="btn btn-default" data-toggle="collapse"
                                data-target="#dados-cliente" style="float: right; margin-top: -8px">+
                        </button>
                    </h4>
                </div>
                <div id="dados-cliente" class="panel-collapse collapse">

                    <li class="list-group-item"><b>nome: </b>{{$user->name}}</li>
                    <li class="list-group-item"><b>CPF: </b>{{$user->cpf}}</li>
                    <li class="list-group-item"><b>EMAIL: </b>{{$user->email}}</li>
                    <li class="list-group-item"><b>Endereço: </b>{{$user->email}}</li>
                    <li class="list-group-item"><b>Telefone: </b>{{$user->telefone}}</li>
                    <li class="list-group-item"><b>Tipo de usuário: </b>
                        @foreach($tipoUsuario as $t)
                            {{$t->descricao}},
                        @endforeach
                    </li>
                </div>
            </div>


        </div>
    </div>





@endsection