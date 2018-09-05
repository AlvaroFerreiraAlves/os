<div class="modal fade" id="customermodal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('message'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ session('message') }}</li>
                        </ul>
                    </div>
                @endif


                <form class="form-horizontal" id="form-customer-modal">
                    {{csrf_field()}}
                    <fieldset>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nome">Nome:</label>
                            <div class="col-md-5">
                                <input id="nome" name="nome" type="text" placeholder=""
                                       class="form-control input-md"
                                       required="">

                            </div>
                        </div>

                        <!-- Select Basic -->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="tipo_cliente">Tipo de pessoa:</label>
                            <div class="col-md-5">
                                <select id="tipo_cliente" name="tipo_cliente" class="form-control">
                                    <option value="0">Física</option>
                                    <option value="1">Jurídica</option>
                                </select>
                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cnpj_cpf">CNPJ/CPF:</label>
                            <div class="col-md-5">
                                <input id="cnpj_cpf" name="cnpj_cpf" type="text" placeholder=""
                                       class="form-control input-md"
                                       required="">

                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="endereco">Endereço:</label>
                            <div class="col-md-5">
                                <input id="endereco" name="endereco" type="text" placeholder=""
                                       class="form-control input-md"
                                       value="{{$customers->endereco or old('endereco') }}" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cep">CEP:</label>
                            <div class="col-md-5">
                                <input id="cep" name="cep" type="text" placeholder=""
                                       class="form-control input-md"
                                >

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="telefone">Telefone:</label>
                            <div class="col-md-5">
                                <input id="telefone" name="telefone" type="text" placeholder=""
                                       class="form-control input-md"
                                >

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="celular">Celular:</label>
                            <div class="col-md-5">
                                <input id="celular" name="celular" type="text" placeholder=""
                                       class="form-control input-md"
                                       required="">

                            </div>
                        </div>


                        <input type="hidden" id="status" name="status" value="1">


                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="salvar"></label>
                            <div class="col-md-4">
                                <button type="button" id="save-customer" name="save-customer" onclick="saveCustomer()"
                                        class="btn btn-primary">Salvar
                                </button>
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