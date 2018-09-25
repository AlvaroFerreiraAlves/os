@extends('template.main')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session('message') }}</li>
            </ul>
        </div>
    @endif

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th>Cód. produto</th>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Categoria</th>
                    <th>Valor</th>
                    <th></th>


                </tr>
                </thead>
                <tbody id="customers-list" name="customers-list">
                @foreach($items as $item)
                    @if($item->id_categoria_item == 2)
                        @if($item->status == 1)
                            <tr>

                                <td>{{$item->id}}</td>
                                <td>{{$item->nome}}</td>
                                <td>{{$item->descricao}}</td>
                                <td>{{$item->category->descricao}}</td>
                                <td>{{$item->valor}}</td>

                                <td>
                                    <a href="{{route("detalhes.item", $item->id)}}" class="btn btn-primary"><i
                                                class="fa fa-eye" aria-hidden="true"></i> Detalhes</a>

                                    <a href="{{route("excluir.item", $item->id)}}" class="btn btn-danger" onclick="return confirm('Confirmar exclusão de registro?');"><i class="fa fa-trash-o" aria-hidden="true"></i>Excluir</a>


                                </td>


                            </tr>
                        @endif
                    @endif
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection