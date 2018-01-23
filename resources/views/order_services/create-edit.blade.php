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

        <form class="form-horizontal" method="post" action="{{--{{url('companies/'.$companies->id.'/update')}}--}}">
            {!! method_field('PUT') !!}
            @else
                <form class="form-horizontal" method="post" action="{{route('teste')}}" name="form2">
                    @endif
                    {{csrf_field()}}


                    <fieldset>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="col-md-12" for="id_tipo_ordem_servico">Tipo de Documento</label>
                                <select id="id_tipo_ordem_servico" name="id_tipo_ordem_servico" class="form-control">
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
                                       class="form-control input-md" value="{{$orderService->n_serie or old('n_serie')}}">
                            </div>
                        </div>

                        <!-- Textarea -->
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="col-md-12" for="p_info">Problema informado pelo cliente</label>
                                @if(isset($orderService))
                                    <textarea class="form-control" id="p_info" name="p_info">{{$orderService->p_info or old('p_info')}}</textarea>
                                @else
                                    <textarea class="form-control" id="p_info" name="p_info"></textarea>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label class="col-md-12" for="p_const">Problema constado</label>
                                @if(isset($orderService))
                                <textarea class="form-control" id="p_const" name="p_const">{{$orderService->p_const or old('p_const')}}</textarea>
                                    @else
                                    <textarea class="form-control" id="p_const" name="p_const"></textarea>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label class="col-md-12" for="s_exec">Serviço executado</label>
                                @if(isset($orderService))
                                <textarea class="form-control" id="s_exec" name="s_exec">{{$orderService->s_exec or old('s_exec')}}</textarea>
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

                    </fieldset>
                </form>
        </form>

        <form class="form-horizontal" id="form">
            {{ csrf_field() }}
            <fieldset>

                <div class="col-md-4">
                    Produto/Serviço:
                    <select id="itens" name="itens" class="form-control">
                        @foreach($itens as $i)
                            <option id="option" value="{{$i->id}}">{{$i->nome}}</option>
                        @endforeach
                    </select>

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

                    <button class="btn btn-success" type="button" onclick="add()" id="salvar">+</button>

                </div>

            </fieldset>
        </form>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>valor</th>
                        <th>Quantidade.</th>
                        <th>Subtotal</th>
                        <th></th>

                    </tr>
                    </thead>
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
                    <h3 id="total">Total: R$ {{$item->total()}}</h3>
                </div>
            </div>
        </div>
        <hr>

        <input class="btn btn-success" type="submit" value="salvar" onClick="document.form2.submit()">

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


            $(document).on('click', '#aplicar', function () {
                var desconto = $("#desconto").val();


                $.ajax({
                    url: "order/total/" + desconto,
                    method: "POST",
                    data: ""
                }).done(function (data) {
                    $("#total").text("Total: R$ " + data);
                    $('#desconto').val(0);
                });
            });

        </script>

@endsection