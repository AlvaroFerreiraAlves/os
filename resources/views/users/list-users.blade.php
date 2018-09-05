@extends('template.main')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session('message') }}</li>
            </ul>
        </div>
    @endif

    <p><a href="{{route('register')}}" class="btn btn-success">Cadastrar usuário</a></p>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>email</th>
                    <th>Telefone</th>
                    <th></th>


                </tr>
                </thead>
                <tbody id="users-list" name="users-list">
                @foreach($users as $user)
                    @if($user->status == 1)
                        <tr>

                            <td>{{$user->name}}</td>
                            <td>{{$user->cpf}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->telefone}}</td>
                            <td>
                                <a href="{{route("detalhes.empresa", $user->id)}}" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Detalhes</a>

                                <a href="{{route("excluir.cliente", $user->id)}}" class="btn btn-danger" onclick="return confirm('Confirmar exclusão de registro?');"><i class="fa fa-trash-o" aria-hidden="true"></i>Excluir</a>

                            </td>


                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection