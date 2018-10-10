@extends('template.main')

@section('content')


    <div class="alert alert-danger print-error-msg-order" style="display:none">
        <ul></ul>
    </div>

    <div class="alert alert-success print-success-msg-order" style="display:none">
        <ul></ul>
    </div>

    <ul class="nav nav-tabs nav-justified">
        <li class="active"><a data-toggle="pill" href="#home">Dados gerais Ordem de serviço / Orçamento</a></li>
        <li><a data-toggle="pill" href="#menu1">Adicionar Produto / Serviço</a></li>
    </ul>
    <hr>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">


                        <form class="form-horizontal" id="form-ordens">

                            {{csrf_field()}}


                            <fieldset>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="col-md-12" for="id_tipo_ordem_servico">Tipo de Documento</label>

                                        <select id="id_tipo_ordem_servico" name="id_tipo_ordem_servico"
                                                class="form-control input-md">
                                            @if(isset($orderService))
                                                @forelse($tipoOrdem as $tipo)
                                                    <option value="{{$tipo->id}}"
                                                            @if($tipo->id == $orderService->id_tipo_ordem_servico)
                                                            selected
                                                            @endif
                                                    >{{$tipo->descricao}}</option>
                                                @empty
                                                    não há dados
                                                @endforelse
                                            @else
                                                @forelse($tipoOrdem as $tipo)
                                                    <option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                                                @empty
                                                    não há dados
                                                @endforelse
                                            @endif
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-12" for="id_empresa">Empresa</label>

                                        <select id="id_empresa" name="id_empresa" class="form-control">
                                            @if(isset($orderService))
                                                @forelse($companies as $company)
                                                    @if($company->status == 1)
                                                    <option value="{{$company->id}}"
                                                            @if($company->id == $orderService->id_empresa)
                                                            selected
                                                            @endif
                                                    >{{$company->razao_social}}</option>
                                                    @endif
                                                @empty
                                                    não há dados
                                                @endforelse
                                            @else
                                                @forelse($companies as $company)
                                                    @if($company->status == 1)
                                                    <option value="{{$company->id}}">{{$company->razao_social}}</option>
                                                    @endif
                                                @empty
                                                    não há dados
                                                @endforelse
                                            @endif
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-12" for="id_cliente">Cliente</label>
                                        <div class="customer input-group">
                                            <select id="id_cliente" name="id_cliente" class="form-control">
                                                @if(isset($orderService))
                                                    @forelse($customers as $customer)
                                                        @if($customer->status == 1)
                                                        <option value="{{$customer->id}}"
                                                                @if($customer->id == $orderService->id_cliente)
                                                                selected
                                                                @endif
                                                        >{{$customer->nome}}</option>
                                                        @endif
                                                    @empty
                                                        não há dados
                                                    @endforelse
                                                @else
                                                    @forelse($customers as $customer)
                                                        @if($customer->status == 1)
                                                        <option value="{{$customer->id}}">{{$customer->nome}}</option>
                                                        @endif
                                                    @empty
                                                        não há dados
                                                    @endforelse
                                                @endif
                                            </select>
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#customermodal" onclick="hideMessage()">+
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-12" for="tecnico">Técnico responsável</label>

                                        <select id="tecnico" name="tecnico" class="form-control">
                                            @if(isset($orderService))
                                                @forelse($tecnicos as $tecnico)
                                                    @if($tecnico->status == 1)
                                                    <option value="{{$tecnico->id}}"
                                                            @if($tecnico->id == $orderService->tecnico)
                                                            selected
                                                            @endif
                                                    >{{$tecnico->name}}</option>
                                                    @endif
                                                @empty
                                                    não há dados
                                                @endforelse
                                            @else
                                                @forelse($tecnicos as $tecnico)
                                                    @if($tecnico->status == 1)
                                                    <option value="{{$tecnico->id}}">{{$tecnico->name}}</option>
                                                    @endif
                                                @empty
                                                    não há dados
                                                @endforelse
                                            @endif
                                        </select>


                                    </div>
                                </div>
                                <hr>

                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-md-12" for="equipamento">Equipamento</label>
                                        <input id="equipamento" name="equipamento" type="text" placeholder=""
                                               class="form-control input-md"
                                               value="{{$orderService->equipamento or old('equipamento')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-12" for="n_serie">N° de série</label>
                                        <input id="n_serie" name="n_serie" type="text" placeholder=""
                                               class="form-control input-md"
                                               value="{{$orderService->n_serie or old('n_serie')}}">
                                    </div>
                                </div>

                                <!-- Textarea -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="col-md-12" for="p_info">Problema informado pelo cliente</label>
                                        @if(isset($orderService))
                                            <textarea class="form-control" id="p_info"
                                                      name="p_info">{{$orderService->p_info or old('p_info')}}</textarea>
                                        @else
                                            <textarea class="form-control" id="p_info" name="p_info"></textarea>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-md-12" for="p_const">Problema constado</label>
                                        @if(isset($orderService))
                                            <textarea class="form-control" id="p_const"
                                                      name="p_const">{{$orderService->p_const or old('p_const')}}</textarea>
                                        @else
                                            <textarea class="form-control" id="p_const" name="p_const"></textarea>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-md-12" for="s_exec">Serviço executado</label>
                                        @if(isset($orderService))
                                            <textarea class="form-control" id="s_exec"
                                                      name="s_exec">{{$orderService->s_exec or old('s_exec')}}</textarea>
                                        @else
                                            <textarea class="form-control" id="s_exec" name="s_exec"></textarea>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <!-- Select Basic -->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-md-12" for="situacao">Situação atual</label>
                                        <select id="situacao" name="situacao" class="form-control">
                                            <option value="1">Em aberto</option>
                                            <option value="2">Em andamento</option>
                                            <option value="3">Concluído</option>
                                            <option value="4">Cancelado</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-12" for="dt_prox_manut">Próxima manutenção</label>

                                        <input id="dt_prox_manut" name="dt_prox_manut" type="date" placeholder=""
                                               class="form-control input-md"
                                               value="{{$orderService->dt_prox_manut or old('dt_prox_manut') }}"
                                               required="">
                                    </div>
                                </div>
                                <hr>

                                <input type="hidden" name="status" id="status" value="1">
                                <input type="hidden" name="id_usuario" id="id_usuario" value="{{auth()->user()->id}}">


                            </fieldset>
                        </form>

                <!-- Modal Cliente-->

                @include('order_services.modals.customer')

            <!-- Modal Técnico-->

                @include('order_services.modals.technician')

        </div>

        <div id="menu1" class="tab-pane fade">
            <div class="container">
                <form class="form-horizontal" id="form-add-item">
                    {{ csrf_field() }}
                    <fieldset>
                        @if(isset($orderService))
                            <input type="hidden" id="idordem" name="idordem" value="{{$orderService->id}}">
                    @endif

                    <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Produto/Serviço</label>
                            <div class="col-md-4">
                                <div class="item input-group">
                                    <select id="itens" name="itens" class="form-control">
                                        @foreach($itens as $i)
                                            @if($i->status  == 1)
                                            <option id="option" value="{{$i->id}}">{{$i->nome}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#itemmodal" onclick="hideMessage()">+
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Valor</label>
                            <div class="col-md-4">
                                <input id="valor" name="valor" type="number" step="0.1" min="0" placeholder=""
                                       class="form-control input-md" required="" value="0">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Quantidade </label>
                            <div class="col-md-4">
                                <input id="qtd" name="qtd" min="1" type="number" placeholder=""
                                       class="form-control input-md" required="" value="1">
                            </div>
                        </div>

                        <!-- Button -->

                            @if(isset($orderService))
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="btn-add-item"></label>
                                    <div class="col-md-4">
                                        <button type="button" id="btn-add-item" name="btn-add-item" class="btn btn-primary"
                                                onclick="addItem()">Adicionar
                                        </button>
                                    </div>
                                </div>
                                @else
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="btn-add-item"></label>
                                    <div class="col-md-4">
                                        <button type="button" id="btn-add-item" name="btn-add-item" class="btn btn-primary"
                                                onclick="addItem()">Adicionar
                                        </button>
                                    </div>
                                </div>
                                @endif




                    </fieldset>
                </form>
            </div>
            @include('order_services.modals.item')

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>valor</th>
                            <th>Quantidade.</th>
                            <th>Desconto.</th>
                            <th>Subtotal</th>
                            <th></th>

                        </tr>
                        </thead>
                        @if(isset($orderService))
                            <tbody id="products-list" name="products-list">
                            @foreach($itemsOrderSession as $ios)
                                <tr class="product" id="product{{$ios['item']->id}}">

                                    <td>{{$ios['item']->id}}</td>
                                    <td>{{$ios['item']->nome}}</td>
                                    <td>{{number_format($ios['item']->valor, 2, ',', '')}}</td>
                                    <td>{{$ios['item']->qtd}}</td>
                                    @if($ios['item']->desconto)
                                        <td id="descproduct{{$ios['item']->id}}">{{number_format($ios['item']->desconto, 2, ',', '')}}</td>
                                    @else
                                        <td id="descproduct{{$ios['item']->id}}">{{number_format(0, 2, ',', '')}}</td>
                                    @endif
                                    <td>{{number_format(($ios['item']->valor*$ios['item']->qtd)-($ios['item']->desconto), 2, ',', '')}}</td>
                                    <td>
                                        <button type="button" id="delete{{$ios['item']->id}}"
                                                class="btn btn-danger btn-delete delete-item"
                                                value="{{$ios['item']->id}}">X
                                        </button>

                                    </td>

                                </tr>

                            @endforeach
                            </tbody>
                        @else
                            <tbody id="products-list" name="products-list">
                            @foreach($prodService as $ps)
                                <tr class="product" id="product{{$ps['item']->id}}">

                                    <td>{{$ps['item']->id}}</td>
                                    <td>{{$ps['item']->nome}}</td>
                                    <td>{{number_format($ps['item']->valor, 2, ',', '')}}</td>
                                    <td>{{$ps['qtd']}}</td>
                                    @if($ps['item']->desconto)
                                        <td id="descproduct{{$ps['item']->id}}">{{number_format($ps['item']->desconto, 2, ',', '')}}</td>
                                    @else
                                        <td id="descproduct{{$ps['item']->id}}">{{number_format(0, 2, ',', '')}}</td>
                                    @endif
                                    <td>{{number_format(($ps['qtd']*$ps['item']->valor)-($ps['item']->desconto), 2, ',', '')}}</td>
                                    <td>
                                        <button type="button" id="delete{{$ps['item']->id}}"
                                                class="btn btn-danger btn-delete delete-item"
                                                value="{{$ps['item']->id}}">X
                                        </button>


                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        @endif

                    </table>
                    <hr>

                    <!-- Text input-->

                    <form class="form-horizontal" id="form-desconto-total">

                        <div class="col-md-3">
                            Desconto total
                            <div class="input-group">
                                <input id="desconto" name="desconto" type="number" step="0.1" min="0" placeholder=""
                                       class="form-control input-md" value="0">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="button" id="aplicar"
                                            onclick="descontoTotal()">Aplicar
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>


                    <div class="col-md-3" style="float: right">
                        @if(isset($orderService))
                            <h3 id="total">Total: R$ {{$item->total()}}</h3>
                        @else
                            <h3 id="total">Total: R$ {{$item->total()}}</h3>
                        @endif
                    </div>
                </div>
            </div>

            <hr>
            @if(isset($orderService))
                <button type="button" id="update-item" name="update-item" onclick="updateOrders({{$orderService->id}})"
                        class="btn btn-success">Atualizar
                </button>            @else
                <button type="button" id="save-orders" name="save-orders" onclick="saveOrders()"
                        class="btn btn-success">Salvar
                </button>
            @endif
        </div>

    </div>



@endsection




