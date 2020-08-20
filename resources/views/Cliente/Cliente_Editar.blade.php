@extends('Share')

@section('content')
@if($errors->any())
<div class="container">
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Editar: {{$client->client_name}}</h1>
                </div>
                <div class="card-body">
                    <form class="card p-2" method="POST" action="{{ route('Cliente.update', $client->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Nome</label>
                            <input required minlength="5" maxlength="255" type="text" class="form-control" name="client_name" value="{{$client->client_name}}">
                        </div>
                        Status
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="client_status" id="exampleRadios1" value="1" @if($client->client_status == '1') checked @endif>
                            <label class="form-check-label" for="exampleRadios1">
                                Ativar Cliente
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="client_status" id="exampleRadios2" value="0" @if($client->client_status == '0') checked @endif>
                            <label class="form-check-label" for="exampleRadios2">
                            Desativar Cliente
                            </label>
                        </div>
                        <div>
                            <a href="{{ route('Cliente.show', $client->id) }}" class="btn btn-danger">Voltar</a>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection