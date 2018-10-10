@extends('template.main')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session('message') }}</li>
            </ul>
        </div>
    @endif
    @foreach(auth()->user()->tipoUsuario as $t)
        @if($t->pivot->id_tipo_usuario == 1 || $t->pivot->id_tipo_usuario == 2)
            <p><a href="{{route('cadastrar.empresa')}}" class="btn btn-success">Cadastrar empresa</a></p>
            @break
        @endif
    @endforeach

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th>Cód. Empresa</th>
                    <th>Razão Social</th>
                    <th>CNPJ</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>celular</th>
                    <th></th>


                </tr>
                </thead>
                <tbody id="companys-list" name="companys-list">
                @foreach($companies as $company)
                    @if($company->status == 1)
                        <tr>

                            <td>{{$company->id}}</td>
                            <td>{{$company->razao_social}}</td>
                            <td>{{$company->cnpj}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->telefone}}</td>
                            <td>{{$company->celular}}</td>
                            <td>
                                <a href="{{route("detalhes.empresa", $company->id)}}" class="btn btn-primary"><i
                                            class="fa fa-eye" aria-hidden="true"></i> Detalhes</a>

                                @foreach(auth()->user()->tipoUsuario as $t)
                                    @if($t->pivot->id_tipo_usuario == 1 || $t->pivot->id_tipo_usuario == 2)
                                        <a href="{{route("excluir.empresa", $company->id)}}" class="btn btn-danger"
                                           onclick="return confirm('Confirmar exclusão de registro?');"><i
                                                    class="fa fa-trash-o" aria-hidden="true"></i>Excluir</a>
                                        @break
                                    @endif
                                @endforeach
                            </td>


                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection