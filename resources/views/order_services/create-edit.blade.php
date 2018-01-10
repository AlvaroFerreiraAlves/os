@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" id="form">
                        {{ csrf_field() }}
                        <fieldset>
                            <!-- Form Name -->
                            <legend>Form Name</legend>

                                <div class="col-md-4">
                                    Produto/Serviço:
                                    <select id="itens" name="itens" class="form-control">
                                        @foreach($itens as $i)
                                            <option id="option" value="{{$i->id}}">{{$i->nome}}</option>
                                        @endforeach
                                    </select>

                                </div>

                            <div class="col-md-2">

                                valor R$: <input id="valor" name="valor" type="number" step="0.1" min="0" placeholder="" class="form-control input-md" required="" value="0">


                            </div>

                            <div class="col-md-2">

                               Quantidade: <input id="qtd" name="qtd" min="1" type="number" placeholder="" class="form-control input-md" required="" value="1">


                            </div>

                            <div class="col-md-2">

                                <button class="btn btn-success" type="button" onclick="add()" id="salvar">+</button>

                            </div>







                        </fieldset>
                    </form>



                    <div id="load">

                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>valor</th>
                                    <th>Quantidade.</th>
                                    <th>Valor Total</th>
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


                                <div class="col-md-3"><h3 id="total">R$ {{$item->total()}}</h3></div>



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <script>



        $(document).ready(function(){
            var seletc = $("#itens :selected").val();
            $.ajax({
                url: "set-value/" + seletc,
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

                    product = '<tr id="product' + data.item.id + '"><td>' + data.item.id + '</td><td>' + data.item.nome + '</td><td>' + data.item.valor + '</td><td>' + data.qtd + '</td><td>' + data.item.valor*data.qtd + '</td>';
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
                url: "removeservice/" + parametro,
                method: "POST",
                data: data
            }).done(function (data) {

                var tr = $("#" + id).closest('tr');
                tr.remove();
                total();
            })
        });

        $(document).ready(function() {
            $(".input-text").keypress(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });

        $(document).on('click', '#itens', function() {
            var id = event.target.id;
            var parametro = $("#" + id).val();

            $.ajax({
                url: "set-value/" + parametro,
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
                url: "{{route("total")}}",
                method: "POST",
                data: ""
            }).done(function (data) {
                $("#total").text("R$ "+data);
            });
        }
        


    </script>
@endsection