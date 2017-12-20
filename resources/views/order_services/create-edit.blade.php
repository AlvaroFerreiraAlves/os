@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" id="formulario">
                        {{ csrf_field() }}
                        <fieldset>
                            <!-- Form Name -->
                            <legend>Form Name</legend>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="itens">Serviços:</label>
                                <div class="col-md-4">

                                    <select id="itens" name="itens" class="form-control">
                                        @foreach($itens as $i)
                                            <option value="{{$i->id}}">{{$i->nome}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="salvar"></label>
                                <div class="col-md-4">
                                    <button type="button" id="salvar">Salvar</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>


                    <a href="{{url('order/salva-ordem')}}" class="btn btn-success">Salvar</a>
                    <div id="load">

                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>valor</th>
                                    <th>Ações</th>

                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($prodService as $ps)
                                    <tr id="product{{$ps->id}}">

                                        <td>{{$ps->id}}</td>
                                        <td>{{$ps->nome}}</td>
                                        <td>{{$ps->valor}}</td>
                                        <td>
                                            <form action="{{url('order/removeservice/'.$ps->id)}}" method="post">
                                                <button type="submit" class="btn btn-danger btn-delete delete-product" value="{{$ps->id}}">X</button>
                                            </form>

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
                </div>

            </div>
        </div>
    </div>
</div>







@endsection