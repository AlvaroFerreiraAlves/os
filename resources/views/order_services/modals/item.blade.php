<div class="modal fade" id="itemmodal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Produto/Serviço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>

                <div class="alert alert-success print-success-msg" style="display:none">
                    <ul></ul>
                </div>


                <form class="form-horizontal" method="post" action="{{url('items/store')}}">

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
                                        @foreach($category as $c)
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
                                        @forelse($category as $c)
                                            <option value="{{$c->id}}">{{$c->descricao}}</option>
                                        @empty
                                            No Category
                                        @endforelse
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


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
            </div>
        </div>
    </div>
</div>
