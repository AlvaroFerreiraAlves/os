@extends('template.main')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p><a href="{{route("editar.item", $item->id)}}" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></p>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        @if($item->id_categoria_item == 1)
                            Dados do produto
                        @else
                            Dados do serviço
                        @endif
                        <button type="button" class="btn btn-default" data-toggle="collapse"
                                data-target="#dados-cliente" style="float: right; margin-top: -8px">+
                        </button>
                    </h4>
                </div>
                <div id="dados-cliente" class="panel-collapse collapse">

                    <li class="list-group-item"><b>Nome: </b>{{$item->nome}}</li>
                    <li class="list-group-item"><b>Descrição: </b>{{$item->descricao}}</li>
                    <li class="list-group-item"><b>Valor: </b>{{$item->valor}}</li>
                    <li class="list-group-item"><b>Categoria: </b>{{$item->id_categoria_item}}</li>
                </div>
            </div>


        </div>
    </div>

@endsection