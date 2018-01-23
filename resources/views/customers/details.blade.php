@extends('template.main')

@section('content')




    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p><a href="{{route("editar.cliente", $customer->id)}}" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></p>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Dados do Cliente
                        <button type="button" class="btn btn-default" data-toggle="collapse"
                                data-target="#dados-cliente" style="float: right; margin-top: -8px">+
                        </button>
                    </h4>
                </div>
                <div id="dados-cliente" class="panel-collapse collapse">

                    <li class="list-group-item"><b>nome: </b>{{$customer->nome}}</li>
                    <li class="list-group-item"><b>Tipo de pessoa: </b>{{$customer->tipo_cliente}}</li>
                    <li class="list-group-item"><b>CPF/CNPJ: </b>{{$customer->cnpj_cpf}}</li>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                       Contatos
                        <button type="button" class="btn btn-default" data-toggle="collapse"
                                data-target="#contatos" style="float: right; margin-top: -8px">+
                        </button>
                    </h4>
                </div>
                <div id="contatos" class="panel-collapse collapse">
                    <li class="list-group-item"><b>Telefone: </b>{{$customer->telefone}}</li>
                    <li class="list-group-item"><b>Celular: </b>{{$customer->celular}}</li>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                       Endereço
                        <button type="button" class="btn btn-default" data-toggle="collapse"
                                data-target="#endereco" style="float: right; margin-top: -8px">+
                        </button>
                    </h4>
                </div>
                <div id="endereco" class="panel-collapse collapse">
                    <li class="list-group-item"><b>Endereço: </b>{{$customer->endereco}}</li>
                    <li class="list-group-item"><b>CEP: </b>{{$customer->cep}}</li>
                </div>
            </div>

        </div>
    </div>





@endsection