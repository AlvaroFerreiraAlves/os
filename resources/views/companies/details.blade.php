@extends('template.main')

@section('content')


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p><a href="{{route("editar.empresa", $company->id)}}" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></p>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Dados da Empresa
                        <button type="button" class="btn btn-default" data-toggle="collapse"
                                data-target="#dados-cliente" style="float: right; margin-top: -8px">+
                        </button>
                    </h4>
                </div>
                <div id="dados-cliente" class="panel-collapse collapse">

                    <li class="list-group-item"><b>logo: </b><img src="{{url("storage/logo/{$company->logo}")}}" width="100px" height="100px"></li>
                    <li class="list-group-item"><b>nome: </b>{{$company->razao_social}}</li>
                    <li class="list-group-item"><b>Tipo de pessoa: </b>{{$company->cnpj}}</li>
                    <li class="list-group-item"><b>CPF/CNPJ: </b>{{$company->endereco}}</li>
                </div>
            </div>
        </div>

    </div>





@endsection