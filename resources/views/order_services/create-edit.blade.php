@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal">
                            <fieldset>

                                <!-- Form Name -->
                                <legend>Nova ordem de serviço</legend>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="cliente">Cliente:</label>
                                    <div class="col-md-5">
                                        <select id="cliente" name="cliente" class="form-control">
                                            @foreach($customers as $c)
                                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="tecnico">Técnico resposável:</label>
                                    <div class="col-md-5">
                                        <select id="tecnico" name="tecnico" class="form-control">
                                            @foreach($user as $u)
                                                @foreach($usersTypeUser as $utu)
                                                    @if($utu->id_usuario == $u->id && $utu->id_tipo_usuario ==3)
                                                        <option value="{{$u->id}}">{{$u->name}}</option>
                                                    @endif

                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="tipo_ordem_servico">Tipo:</label>
                                    <div class="col-md-5">
                                        <select id="tipo_ordem_servico" name="tipo_ordem_servico" class="form-control">
                                            @foreach($typeOrder as $to)
                                            <option value="{{$to->id}}">{{$to->descricao}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="situacao">Situação:</label>
                                    <div class="col-md-5">
                                        <select id="situacao" name="situacao" class="form-control">
                                            <option value="0">Em aberto</option>
                                            <option value="1">Finalizado</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="equipamento">Equipamento:</label>
                                    <div class="col-md-5">
                                        <input id="equipamento" name="equipamento" type="text" placeholder=""
                                               class="form-control input-md" required="">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="n_serie">Nº série:</label>
                                    <div class="col-md-5">
                                        <input id="n_serie" name="n_serie" type="text" placeholder=""
                                               class="form-control input-md" required="">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="p_info">Problema Informado:</label>
                                    <div class="col-md-5">
                                        <input id="p_info" name="p_info" type="text" placeholder=""
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="p_const">Problema constado:</label>
                                    <div class="col-md-5">
                                        <input id="p_const" name="p_const" type="text" placeholder=""
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="s_exec">Serviço executado:</label>
                                    <div class="col-md-5">
                                        <input id="s_exec" name="s_exec" type="text" placeholder=""
                                               class="form-control input-md">

                                    </div>
                                </div>
                                <hr>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="servico_produto">Serviços /
                                        Produtos:</label>
                                    <div class="col-md-3">
                                        <select id="servico_produto" name="servico_produto" class="form-control">
                                            @foreach($items as $i)
                                            <option value="{{$i->id}}">{{$i->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button id="additem" name="additem" class="btn btn-success">+</button>

                                </div>


                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="valor">Valor:</label>
                                    <div class="col-md-2">
                                        <input id="valor" name="valor" type="number" step="0.1" placeholder=""
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="qtd">Quantidade:</label>
                                    <div class="col-md-2">
                                        <input id="qtd" name="qtd" type="number" placeholder=""
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="adicionar"></label>
                                    <div class="col-md-4">
                                        <button id="adicionar" name="adicionar" class="btn btn-primary">adicionar
                                        </button>
                                    </div>
                                </div>
                                <hr>

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <th>XXX</th>
                                        <th>XXX</th>
                                        <th>XXX</th>
                                        <th>XXX</th>

                                        <!-- On cells (`td` or `th`) -->
                                        <tr>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-1 control-label" for="desconto">Desconto:</label>
                                    <div class="col-md-2">
                                        <input id="desconto" name="desconto" type="number" step="0.1" placeholder=""
                                               class="form-control input-md">
                                    </div>
                                    <button id="aplicar" name="aplicar" class="btn btn-primary">Aplicar</button>
                                </div>

                                <hr>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="dt_prox_manut">Próxima
                                        manutenção:</label>
                                    <div class="col-md-4">
                                        <input id="dt_prox_manut" name="dt_prox_manut" type="text" placeholder=""
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Textarea -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="obs">Obs. gerais:</label>
                                    <div class="col-md-4">
                                        <textarea class="form-control" id="obs" name="obs"></textarea>
                                    </div>
                                </div>


                            </fieldset>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection