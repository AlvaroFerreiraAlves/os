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

                        @if(isset($item))

                            <form class="form-horizontal" method="post" action="{{url('items/'.$item->id.'/update')}}">
                                {!! method_field('PUT') !!}
                                @else
                                    <form class="form-horizontal" method="post" action="{{url('items/store')}}">
                                        @endif
                                        {{csrf_field()}}
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Cadastrar Serviço/Produto</legend>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Nome:</label>
                                <div class="col-md-4">
                                    <input id="nome" name="nome" type="text" placeholder=""
                                           class="form-control input-md" value="{{$item->nome or old('nome')}}" required="">

                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="descricao">Descrição</label>
                                <div class="col-md-4">
                                    <input class="form-control" id="descricao" name="descricao" value="{{$item->descricao or old('descricao')}}">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="valor">Valor:</label>
                                <div class="col-md-4">
                                    <input id="valor" name="valor" type="number" step="0.01" placeholder=""
                                           class="form-control input-md" value="{{$item->valor or old('valor')}}" required="">

                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="id_categoria_item">Categoria:</label>
                                <div class="col-md-4">
                                    <select id="id_categoria_item" name="id_categoria_item" class="form-control">
                                        @foreach($categorias as $c)
                                        <option value="{{$c->id}}">{{$c->descricao}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" id="status" name="status" value="1">
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="salvar"></label>
                                <div class="col-md-4">
                                    <button id="salvar" name="salvar" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection