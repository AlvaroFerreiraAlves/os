{{--
<div class="modal fade" id="technicianmodal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Técnico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="{{ route('register')}}">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Nome: </label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name"
                                   required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                        <label for="cpf" class="col-md-4 control-label">CPF: </label>

                        <div class="col-md-6">
                            <input id="cpf" type="text" class="form-control" name="cpf"
                                   required autofocus @if(isset($user)) disabled @endif>

                            @if ($errors->has('cpf'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail: </label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email"
                                   value="{{$user->email or old('email') }}" required  @if(isset($user)) disabled @endif>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    @if(!isset($user))
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha: </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                            </div>
                        </div>
                    @endif

                    <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                        <label for="endereco" class="col-md-4 control-label">Endereço: </label>

                        <div class="col-md-6">
                            <input id="endereco" type="text" class="form-control" name="endereco"
                                   required autofocus>

                            @if ($errors->has('endereco'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                        <label for="telefone" class="col-md-4 control-label">Telefone: </label>

                        <div class="col-md-6">
                            <input id="telefone" type="text" class="form-control" name="telefone"
                                   required autofocus>

                            @if ($errors->has('telefone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <!-- Select Multiple -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="tipousuario"></label>
                        <div class="col-md-4">
                            <select id="tipousuario" name="tipousuario[]" class="form-control" multiple="multiple">


                                <option value="" selected>tecnico</option>


                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="status" name="status" value="1">

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
            </div>
        </div>
    </div>
</div>






--}}
