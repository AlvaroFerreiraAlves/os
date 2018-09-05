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
                    <th>Cód. orçamento</th>
                    <th>Cliente</th>
                    <th>Técnico</th>
                    <th>Data Próxima manut.</th>
                    <th></th>


                </tr>
                </thead>
                <tbody id="customers-list" name="customers-list">
                @foreach($budgets as $budget)
                    @if($budget->id_tipo_ordem_servico == 1)
                        <tr>

                            <td>{{$budget->id}}</td>

                            <td>{{$budget->cliente->nome}}</td>

                            <td>{{$budget->technician->name}}</td>
                            <td>{{$budget->dt_prox_manut}}</td>



                            <td>
                                <a href="{{route("detalhes.ordem", $budget->id)}}" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Detalhes</a>

                                <a href="{{route("excluir.cliente", $budget->id)}}" class="btn btn-danger" onclick="return confirm('Confirmar exclusão de registro?');"><i class="fa fa-trash-o" aria-hidden="true"></i>Excluir</a>

                            </td>


                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection