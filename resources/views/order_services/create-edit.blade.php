@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Form Name</legend>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="itens">itens:</label>
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
                                <label class="col-md-4 control-label" for="add"></label>
                                <div class="col-md-4">
                                    <button id="add" type="button" name="add" class="btn btn-primary">add</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="table">table</label>
                        <div class="col-md-4">
                            <select id="table" name="table" class="form-control">

                                @foreach($prodService as $ps)
                                    @if($ps==null)

                                    @else
                                        <option value="{{$ps->id}}">{{$ps->nome}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>

@endsection