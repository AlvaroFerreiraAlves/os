@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

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

                    @if(isset($categories))

                        <form class="form-horizontal" method="post" action="{{url('categories/'.$categories->id.'/update')}}">
                            {!! method_field('PUT') !!}
                            @else
                                <form class="form-horizontal" method="post" action="{{url('categories/store')}}">
                                    @endif
                                    {{csrf_field()}}
                                    <fieldset>

                                        <!-- Form Name -->
                                        <legend>Cadastrar Categorias</legend>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="descricao">Descricao:</label>
                                            <div class="col-md-4">
                                                <input id="descricao" name="descricao" type="text" placeholder="" class="form-control input-md" value="{{$categories->descricao or old('descricao') }}" required="">

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