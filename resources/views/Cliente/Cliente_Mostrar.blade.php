@extends('Share')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{$client->client_name}}</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Emails</th>
                                        <th scope="col"><a href="{{ route('NovoEmail', $client->id) }}" class="btn btn-success text-center">Adicionar Email</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($emails as $e)
                                    <tr>
                                        <td>{{$e->id}}</td>
                                        <td>{{$e->email_address}}</td>
                                        <form method="POST" action="{{ route('Email.destroy', $e->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <td><button type="submit" class="btn btn-danger">Apagar</button></td>
                                            <td><a href="{{ route('Email.edit', $e->id) }}" class="btn btn-primary">Editar</a></td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Telefones</th>
                                        <th scope="col"><a href="{{ route('NovoTelefone', $client->id) }}" class="btn btn-success text-center">Adicionar Telefone</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($telephones as $t)
                                    <tr>
                                        <td>{{$t->id}}</td>
                                        <td>{{$t->telephone_number}}</td>
                                        <form method="POST" action="{{ route('Telefone.destroy', $t->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <td><button type="submit" class="btn btn-danger">Apagar</button></td>
                                            <td><a href="{{ route('Telefone.edit', $t->id) }}" class="btn btn-primary">Editar</a></td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('Cliente.destroy', $client->id) }}" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="col-12 text-center">
                <div>
                    <br>
                    <button type="submit" class="btn btn-danger">Apagar</button>
                    <a href="{{ route('Cliente.edit', $client->id) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection