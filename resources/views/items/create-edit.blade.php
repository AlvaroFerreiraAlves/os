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

    @if(isset($item))

        <form class="form-horizontal" method="post" action="{{url('items/'.$item->id.'/update')}}">
            {!! method_field('PUT') !!}
            @else
                <form class="form-horizontal" method="post" action="{{url('items/store')}}">
                    @endif
                    {{csrf_field()}}
                    <fieldset>


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
                                <input class="form-control" id="descricao" name="descricao"
                                       value="{{$item->descricao or old('descricao')}}">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="valor">Valor:</label>
                            <div class="col-md-4">
                                <input id="valor" name="valor" type="number" step="0.1" placeholder=""
                                       class="form-control input-md" value="{{$item->valor or old('valor')}}"
                                       required="">

                            </div>
                        </div>

                        <!-- Select Basic -->
                        @if(isset($item))
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="id_categoria_item">Categoria:</label>
                            <div class="col-md-4">
                                <select id="id_categoria_item" name="id_categoria_item" class="form-control">
                                    @foreach($categorias as $c)
                                        <option value="{{$c->id}}"

                                        @if($item->id_categoria_item == $c->id)
                                            selected
                                                @endif
                                            >{{$c->descricao}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @else
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
                        @endif

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


@endsection