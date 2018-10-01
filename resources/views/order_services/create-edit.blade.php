{{--
@extends('template.main')

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($orderService))


        <form class="form-horizontal" name="formupdate" method="post"
              action="{{route("atualizar.item.ordem",$orderService->id)}}">
            {!! method_field('PUT') !!}
            @else
                <form class="form-horizontal" method="post" action="{{route('cadastrar.ordem')}}" name="form2">
                    @endif
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
                                            <option value="{{$company->id}}"
                                                    @if($company->id == $orderService->id_empresa)
                                                    selected
                                                    @endif
                                            >{{$company->razao_social}}</option>
                                        @empty
                                            não há dados
                                        @endforelse
                                    @else
                                        @forelse($companies as $company)
                                            <option value="{{$company->id}}">{{$company->razao_social}}</option>
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
                                                <option value="{{$customer->id}}"
                                                        @if($customer->id == $orderService->id_cliente)
                                                        selected
                                                        @endif
                                                >{{$customer->nome}}</option>
                                            @empty
                                                não há dados
                                            @endforelse
                                        @else
                                            @forelse($customers as $customer)
                                                <option value="{{$customer->id}}">{{$customer->nome}}</option>
                                            @empty
                                                não há dados
                                            @endforelse
                                        @endif
                                    </select>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#customermodal">+
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="col-md-12" for="tecnico">Técnico responsável</label>
                                <div class="input-group">
                                <select id="tecnico" name="tecnico" class="form-control">
                                    @if(isset($orderService))
                                        @forelse($tecnicos as $tecnico)
                                            <option value="{{$tecnico->id}}"
                                                    @if($tecnico->id == $orderService->tecnico)
                                                    selected
                                                    @endif
                                            >{{$tecnico->name}}</option>
                                        @empty
                                            não há dados
                                        @endforelse
                                    @else
                                        @forelse($tecnicos as $tecnico)
                                            <option value="{{$tecnico->id}}">{{$tecnico->name}}</option>
                                        @empty
                                            não há dados
                                        @endforelse
                                    @endif
                                </select>
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#technicianmodal">+
                                    </button>
                                </div>
                            </div>

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
                                <label class="col-md-12" for="situacao_atual">Situação atual</label>
                                <select id="situacao_atual" name="situacao_atual" class="form-control">
                                    <option value="1">Em aberto</option>
                                    <option value="2">Em andamento</option>
                                    <option value="3">Concluído</option>
                                    <option value="4">cancelado</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12" for="dt_prox_manut">Próxima manutenção</label>

                                <input id="dt_prox_manut" name="dt_prox_manut" type="date" placeholder=""
                                       class="form-control input-md"
                                       value="{{$orderService->dt_prox_manut or old('dt_prox_manut') }}" required="">
                            </div>
                        </div>
                        <hr>

                        <input type="hidden" name="status" id="status" value="1">
                        <input type="hidden" name="id_usuario" id="id_usuario" value="1">
                        @if(isset($orderService))
                            <input type="hidden" name="valor_desconto" id="valor_desconto"
                                   value="{{$orderService->valor_desconto}}">
                        @else
                            <input type="hidden" name="valor_desconto" id="valor_desconto" value="0">
                        @endif

                    </fieldset>
                </form>
        </form>






       @include('order_services.modals.customer')
       @include('order_services.modals.technician')





        <form class="form-horizontal" id="form">
            {{ csrf_field() }}
            <fieldset>
                @if(isset($orderService))
                    <input type="hidden" id="idordem" name="idordem" value="{{$orderService->id}}">
                @endif
                <div class="col-md-4">
                    Produto/Serviço:
                    <div class="input-group">
                    <select id="itens" name="itens" class="form-control">
                        @foreach($itens as $i)
                            <option id="option" value="{{$i->id}}">{{$i->nome}}</option>
                        @endforeach
                    </select>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#technicianmodal">+
                        </button>
                    </div>
                </div>

                </div>

                <div class="col-md-2">

                    valor R$: <input id="valor" name="valor" type="number" step="0.1" min="0" placeholder=""
                                     class="form-control input-md" required="" value="0">
                </div>

                <div class="col-md-2">

                    Quantidade: <input id="qtd" name="qtd" min="1" type="number" placeholder=""
                                       class="form-control input-md" required="" value="1">

                </div>

                <div class="col-md-2">
                    @if(isset($orderService))
                        <button class="btn btn-success" type="button" onclick="updateAdd()" id="salvar1">+</button>
                    @else
                        <button class="btn btn-success" type="button" onclick="add()" id="salvar">+</button>
                    @endif
                </div>

            </fieldset>
        </form>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>valor</th>
                        <th>Quantidade.</th>
                        <th>Subtotal</th>
                        <th></th>

                    </tr>
                    </thead>
                    @if(isset($orderService))
                        <tbody id="items-list-update" name="items-list-update">
                        @foreach($itemsOrderSession as $ios)
                            <tr id="product{{$ios['item']->id}}">

                                <td>{{$ios['item']->id}}</td>
                                <td>{{$ios['item']->nome}}</td>
                                <td>{{$ios['item']->pivot->valor}}</td>
                                <td>{{$ios['item']->pivot->qtd}}</td>
                                <td>{{$ios['item']->pivot->valor*$ios['item']->pivot->qtd}}</td>
                                <td>
                                    <button type="button" id="delete{{$ios['item']->id}}"
                                            class="btn btn-danger btn-delete update-delete-item"
                                            value="{{$ios['item']->id}}">X
                                    </button>


                                </td>

                            </tr>

                        @endforeach
                        </tbody>
                    @else
                        <tbody id="products-list" name="products-list">
                        @foreach($prodService as $ps)
                            <tr id="product{{$ps['item']->id}}">

                                <td>{{$ps['item']->id}}</td>
                                <td>{{$ps['item']->nome}}</td>
                                <td>{{$ps['item']->valor}}</td>
                                <td>{{$ps['qtd']}}</td>
                                <td>{{$ps['qtd']*$ps['item']->valor}}</td>
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


                <div class="col-md-3">
                    Desconto total
                    <div class="input-group">
                        <input id="desconto" name="desconto" type="number" step="0.1" min="0" placeholder=""
                               class="form-control input-md" value="0">
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="button" id="aplicar">Aplicar</button>
                        </div>
                    </div>
                </div>


                <div class="col-md-3" style="float: right">
                    @if(isset($orderService))
                        <input type="hidden" id="desconto-update" name="desconto-update"
                               value="{{$orderService->valor_desconto}}">
                        <h5 id="vdesconto">Desconto: R$ {{$orderService->valor_desconto}}</h5>
                        <h5 id="subtotal-update">Subtotal: R$ {{$item->totalUpdate()}}</h5>
                        <h3 id="total-update">Total: R$ {{$item->totalUpdate()-$orderService->valor_desconto}}</h3>
                    @else
                        <h3 id="total">Total: R$ {{$item->total()}}</h3>
                    @endif
                </div>
            </div>
        </div>

        <hr>
        @if(isset($orderService))
            <input class="btn btn-success" type="submit" value="Salvar" onClick="document.formupdate.submit()">
        @else
            <input class="btn btn-success" type="submit" value="Salvar" onClick="document.form2.submit()">
        @endif

        <script>


            $(document).ready(function () {
                var seletc = $("#itens :selected").val();
                $.ajax({
                    url: "order/set-value/" + seletc,
                    method: "POST",
                    data: seletc
                }).done(function (seletc) {

                    $("#valor").val(seletc);
                    $("#qtd").val(1);
                });

                totalUpdate();

            });

            function add() {
                var data = $('#form').serialize();

                $.ajax({
                    url: "{{route('add.service')}}",
                    method: "POST",
                    data: data
                }).done(function (data) {

                    if (data != '') {

                        product = '<tr id="product' + data.item.id + '"><td>' + data.item.id + '</td><td>' + data.item.nome + '</td><td>' + data.item.valor + '</td><td>' + data.qtd + '</td><td>' + data.item.valor * data.qtd + '</td>';
                        product += '<td><button type="button" id="delete' + data.item.id + '"class="btn btn-danger btn-delete delete-item" value="' + data.item.id + '">X</button></td></tr>';
                        $('#products-list').append(product);

                    }
                    total();


                })
            }

            $(document).on('click', '.delete-item', function () {
                var id = event.target.id;
                var data = $('#form').serialize();
                var parametro = $("#" + id).val();

                $.ajax({
                    url: "order/removeservice/" + parametro,
                    method: "POST",
                    data: data
                }).done(function (data) {

                    var tr = $("#" + id).closest('tr');
                    tr.remove();
                    total();
                })
            });

            $(document).ready(function () {
                $(".input-text").keypress(function (event) {
                    if (event.keyCode == 13) {
                        event.preventDefault();
                        return false;
                    }
                });
            });

            $(document).on('click', '#itens', function () {
                var id = event.target.id;
                var parametro = $("#" + id).val();

                $.ajax({
                    url: "order/set-value/" + parametro,
                    method: "POST",
                    data: parametro
                }).done(function (parametro) {

                    console.log(parametro);
                    $("#valor").val(parametro);
                    $("#qtd").val(1);
                });
            });

            function total() {

                $.ajax({
                    url: "order/total/" + 0,
                    method: "POST",
                    data: ""
                }).done(function (data) {
                    $("#total").text("Total: R$ " + data);
                });
            }

            function totalUpdate() {
                var desconto = $("#desconto-update").val();

                $.ajax({
                    url: "order/total-update/" + 0,
                    method: "POST",
                    data: ""
                }).done(function (data) {
                    var total = parseFloat(data) - parseFloat(desconto);
                    $("#subtotal-update").text("Subtotal: R$ " + data);
                    $("#total-update").text("Total: R$ " + total);
                    if (total < 0) {
                        $("#total-update").text("Total: R$ " + 0);
                    }

                });
            }


            $(document).on('click', '#aplicar', function () {
                var desconto = $("#desconto").val();


                $.ajax({
                    url: "order/total/" + desconto,
                    method: "POST",
                    data: ""
                }).done(function (data) {
                    $("#total").text("Total: R$ " + data);
                    $("#total-update").text("Total: R$ " + data);
                    $("#vdesconto").text("Desconto: R$ " + desconto);
                    $('#desconto').val(0);
                    $("#valor_desconto").val(desconto);
                });
            });

            function updateAdd() {
                var data = $('#form').serialize();

                $.ajax({
                    url: "{{route('add.service.update')}}",
                    method: "POST",
                    data: data
                }).done(function (data) {

                    console.log(data);

                    if (data != '') {

                        items = '<tr id="product' + data.item.id + '"><td>' + data.item.id + '</td><td>' + data.item.nome + '</td><td>' + data.item.valor + '</td><td>' + data.qtd + '</td><td>' + data.item.valor * data.qtd + '</td>';
                        items += '<td><button type="button" id="delete' + data.item.id + '"class="btn btn-danger btn-delete update-delete-item" value="' + data.item.id + '">X</button></td></tr>';
                        $('#items-list-update').append(items);

                    }
                    totalUpdate();
                })
            }


            $(document).on('click', '.update-delete-item', function () {
                var id = event.target.id;
                var data = $('#form').serialize();
                var parametro = $("#" + id).val();
                var subtotal = $("#subtotal-update").text();

                $.ajax({
                    url: "order/removeservice-update/" + parametro,
                    method: "POST",
                    data: data
                }).done(function (data) {

                    var tr = $("#" + id).closest('tr');
                    tr.remove();
                    totalUpdate();

                })
            });

            function saveCustomer() {
                var data = $('#form-customer-modal').serialize();

                $.ajax({
                    url: "customer/store",
                    method: "POST",
                    data: data,
                    success: function () {
                        $(".customer").load(location.href+" .customer>*","");

                        $('#form-customer-modal').each (function(){
                            this.reset();
                        });
                        $('#customermodal').modal('hide');

                    }
                })
            }

        </script>

@endsection
--}}

@extends('template.main')

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <ul class="nav nav-tabs nav-justified">
        <li class="active"><a data-toggle="pill" href="#home">Home</a></li>
        <li><a data-toggle="pill" href="#menu1">Menu 1</a></li>
    </ul>
    <hr>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">

            @if(isset($orderService))

                <form class="form-horizontal" name="formupdate" method="post"
                      action="{{route("atualizar.item.ordem",$orderService->id)}}">
                    {!! method_field('PUT') !!}
                    @else
                        <form class="form-horizontal" method="post" action="{{route('cadastrar.ordem')}}" name="form2">
                            @endif
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
                                                    <option value="{{$company->id}}"
                                                            @if($company->id == $orderService->id_empresa)
                                                            selected
                                                            @endif
                                                    >{{$company->razao_social}}</option>
                                                @empty
                                                    não há dados
                                                @endforelse
                                            @else
                                                @forelse($companies as $company)
                                                    <option value="{{$company->id}}">{{$company->razao_social}}</option>
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
                                                        <option value="{{$customer->id}}"
                                                                @if($customer->id == $orderService->id_cliente)
                                                                selected
                                                                @endif
                                                        >{{$customer->nome}}</option>
                                                    @empty
                                                        não há dados
                                                    @endforelse
                                                @else
                                                    @forelse($customers as $customer)
                                                        <option value="{{$customer->id}}">{{$customer->nome}}</option>
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
                                                    <option value="{{$tecnico->id}}"
                                                            @if($tecnico->id == $orderService->tecnico)
                                                            selected
                                                            @endif
                                                    >{{$tecnico->name}}</option>
                                                @empty
                                                    não há dados
                                                @endforelse
                                            @else
                                                @forelse($tecnicos as $tecnico)
                                                    <option value="{{$tecnico->id}}">{{$tecnico->name}}</option>
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
                                        <label class="col-md-12" for="situacao_atual">Situação atual</label>
                                        <select id="situacao_atual" name="situacao_atual" class="form-control">
                                            <option value="1">Em aberto</option>
                                            <option value="2">Em andamento</option>
                                            <option value="3">Concluído</option>
                                            <option value="4">cancelado</option>
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
                                <input type="hidden" name="id_usuario" id="id_usuario" value="1">
                                {{--@if(isset($orderService))--}}
                                {{--<input type="hidden" name="valor_desconto" id="valor_desconto"--}}
                                {{--value="{{$orderService->valor_desconto}}">--}}
                                {{--@else--}}
                                {{--<input type="hidden" name="valor_desconto" id="valor_desconto" value="0">--}}
                                {{--@endif--}}

                            </fieldset>
                        </form>
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
                                            <option id="option" value="{{$i->id}}">{{$i->nome}}</option>
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
                                <tr class="product-update" id="product{{$ios['item']->id}}">

                                    <td>{{$ios['item']->id}}</td>
                                    <td>{{$ios['item']->nome}}</td>
                                    <td>{{number_format($ios['item']->valor, 2, ',', '')}}</td>
                                    <td>{{$ios['item']->qtd}}</td>
                                    @if($ios['item']->desconto)
                                        <td id="descproduct{{$ios['item']->id}}">{{$ios['item']->desconto}}</td>
                                    @else
                                        <td id="descproduct{{$ios['item']->id}}">-</td>
                                    @endif
                                    <td>{{($ios['item']->valor*$ios['item']->qtd)-($ios['item']->desconto)}}</td>
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
                                        <td id="descproduct{{$ps['item']->id}}">{{$ps['item']->desconto}}</td>
                                    @else
                                        <td id="descproduct{{$ps['item']->id}}">-</td>
                                    @endif
                                    <td>{{($ps['qtd']*$ps['item']->valor)-($ps['item']->desconto)}}</td>
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
                <input class="btn btn-success" type="submit" value="Salvar" onClick="document.formupdate.submit()">
            @else
                <input class="btn btn-success" type="submit" value="Salvar" onClick="document.form2.submit()">
            @endif
        </div>
        {{--<div id="menu2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam.</p>
        </div>
        <div id="menu3" class="tab-pane fade">
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                explicabo.</p>
        </div>--}}
    </div>



@endsection




