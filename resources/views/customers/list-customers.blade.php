@extends('template.main')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session('message') }}</li>
            </ul>
        </div>
    @endif

    

    <p><a href="{{route('cadastrar.cliente')}}" class="btn btn-success">Cadastrar cliente</a></p>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th>Cód. Cliente</th>
                    <th>Nome</th>
                    <th>Tipo de Cliente</th>
                    <th>CPF/CNPJ.</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th></th>


                </tr>
                </thead>
                <tbody id="customers-list" name="customers-list">
                @foreach($customers as $customer)
                    @if($customer->status == 1)
                    <tr>

                        <td>{{$customer->id}}</td>
                        <td>{{$customer->nome}}</td>
                        <td>{{$customer->tipo_cliente}}</td>
                        <td>{{$customer->cnpj_cpf}}</td>
                        <td>{{$customer->telefone}}</td>
                        <td>{{$customer->celular}}</td>
                        <td>
                            <a href="{{route("detalhes.cliente", $customer->id)}}" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Detalhes</a>

                            <a href="{{route("excluir.cliente", $customer->id)}}" class="btn btn-danger" onclick="return confirm('Confirmar exclusão de registro?');"><i class="fa fa-trash-o" aria-hidden="true"></i>Excluir</a>

                        </td>


                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection